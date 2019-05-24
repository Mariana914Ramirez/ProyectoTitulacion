<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DoctorController;
use App\Doctor;
use App\DoctorConsultorio;
use App\Horario;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as Collection;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
        }

        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;

        $lunesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'L')->get();
        $martesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'M')->get();
        $miercolesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'X')->get();
        $juevesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'J')->get();
        $viernesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'V')->get();
        $sabadoHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'S')->get();
        $domingoHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'D')->get();


        $doctores=DB::table('doctores')
        ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->select('doctores.*')
        ->where('doctores.Correo', '=', $usuario)
        ->where('doctor_consultorio.Consultorio', '=', $consultorio)->get();


        $especialidades=DB::table('doctor_especialidad')->select('*')->where('Correo', '=', $usuario)->distinct()->get();
        
    	return view('paginaDoctor', compact('doctores', $doctores, 'especialidades', $especialidades, 'lunesHorarios', $lunesHorarios, 'martesHorarios', $martesHorarios, 'miercolesHorarios', $miercolesHorarios, 'juevesHorarios', $juevesHorarios, 'viernesHorarios', $viernesHorarios, 'sabadoHorarios', $sabadoHorarios, 'domingoHorarios', $domingoHorarios));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
    	//return $request->all();
        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;
        $H1 = $request->input('LunesHora1');
        $M1 = $request->input('LunesMinuto1');
        $H2 = $request->input('LunesHora2');
        $M2 = $request->input('LunesMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='L';
                $horario->save();
            }
        }


        $H1 = $request->input('MartesHora1');
        $M1 = $request->input('MartesMinuto1');
        $H2 = $request->input('MartesHora2');
        $M2 = $request->input('MartesMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='M';
                $horario->save();
            }
        }


        $H1 = $request->input('MiercolesHora1');
        $M1 = $request->input('MiercolesMinuto1');
        $H2 = $request->input('MiercolesHora2');
        $M2 = $request->input('MiercolesMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='X';
                $horario->save();
            }
        }


        $H1 = $request->input('JuevesHora1');
        $M1 = $request->input('JuevesMinuto1');
        $H2 = $request->input('JuevesHora2');
        $M2 = $request->input('JuevesMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='J';
                $horario->save();
            }
        }

        $H1 = $request->input('ViernesHora1');
        $M1 = $request->input('ViernesMinuto1');
        $H2 = $request->input('ViernesHora2');
        $M2 = $request->input('ViernesMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='V';
                $horario->save();
            }
        }


        $H1 = $request->input('SabadoHora1');
        $M1 = $request->input('SabadoMinuto1');
        $H2 = $request->input('SabadoHora2');
        $M2 = $request->input('SabadoMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='S';
                $horario->save();
            }
        }


        $H1 = $request->input('DomingoHora1');
        $M1 = $request->input('DomingoMinuto1');
        $H2 = $request->input('DomingoHora2');
        $M2 = $request->input('DomingoMinuto2');
        for ($i=0; $i < sizeof($H1); $i++) { 
            if(!($H1[$i]==0 && $M1[$i]==0 && $H2[$i]==0 && $M2[$i]==0))
            {
                $horaIni=$H1[$i].":".$M1[$i].":00";
                $horaTer=$H2[$i].":".$M2[$i].":00";

                $horario = new Horario();
                $horario->DoctorConsultorio=$doct_cons;
                $horario->Hora_inicio=$horaIni;
                $horario->Hora_termino=$horaTer;
                $horario->Dia='D';
                $horario->save();
            }
        }
        

        return redirect('/');
    }

    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }



    public function horario()
    {
        return view('modificarHorarios');
    }
}
