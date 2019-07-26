<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DoctorController;
use App\Doctor;
use App\DoctorConsultorio;
use App\Horario;
use App\Precio;
use App\Sugerencia;
use App\Especialidad;
use App\Estudio;
use App\Mail\EspecialidadAgregada;
use App\Cita;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
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
        ->join('consultorios', 'consultorios.Registro', '=', 'doctor_consultorio.Consultorio')
        ->select('doctores.*', 'consultorios.Nombre as Consultorio')
        ->where('doctores.Correo', '=', $usuario)
        ->where('doctor_consultorio.Consultorio', '=', $consultorio)
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();

        
        $especialidades=DB::table('doctor_especialidad')->select('*')->where('Correo', '=', $usuario)->where('Doctor', '=', $doctor)->distinct()->get();


        $revisiones=DB::table('doctor_consultorio')
        ->join('doctores', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->join('horario', 'horario.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->join('precios', 'precios.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->select('doctores.Nombre', 'doctores.Apellidos', 'doctores.FechaNacimiento', 'doctores.Correo', 'doctores.Registro')
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();

        $precios=Precio::select('Descripcion', 'Precio', 'Registro')->where('DoctorConsultorio', '=', $doct_cons)->get();
 
        
    	return view('paginaDoctor', compact('doctores', $doctores, 'especialidades', $especialidades, 'lunesHorarios', $lunesHorarios, 'martesHorarios', $martesHorarios, 'miercolesHorarios', $miercolesHorarios, 'juevesHorarios', $juevesHorarios, 'viernesHorarios', $viernesHorarios, 'sabadoHorarios', $sabadoHorarios, 'domingoHorarios', $domingoHorarios, 'revisiones', $revisiones, 'precios', $precios));
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
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
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






        $revisiones=DB::table('doctor_consultorio')
        ->join('doctores', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->join('horario', 'horario.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->join('precios', 'precios.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->select('doctores.Nombre', 'doctores.Apellidos', 'doctores.FechaNacimiento', 'doctores.Correo', 'doctores.Registro')
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();

        
        if(!$revisiones->isEmpty())
        {
            $especialidades=Especialidad::select('*')->get();

            foreach ($especialidades as $especialidad) {
                $sugerencias=DB::table('sugerencias')
                ->join('usuarios', 'usuarios.Registro', '=', 'sugerencias.Usuario')
                ->select('usuarios.Nombre', 'usuarios.Apellidos', 'usuarios.Correo', 'sugerencias.Registro')
                ->where('sugerencias.Sugerencia', '=', $especialidad->Nombre)
                ->get();
                foreach ($sugerencias as $sugerencia) {
                    $nom = DB::table('sugerencias')
                    ->join('usuarios', 'usuarios.Registro', '=', 'sugerencias.Usuario')
                    ->select('usuarios.Nombre', 'usuarios.Apellidos', 'usuarios.Correo', 'sugerencias.Registro')
                    ->where('sugerencias.Registro', '=', $sugerencia->Registro)
                    ->take(1)->get();
                    $esp = Especialidad::select('Nombre')->where('Registro', '=', $especialidad->Registro)->take(1)->get();

                    $destinatario=$sugerencia->Correo;
                    Mail::to($destinatario)->send(new EspecialidadAgregada($nom, $esp));

                    Sugerencia::where('Registro', '=', $sugerencia->Registro)->delete();
                }

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



    public function horario(Request $request)
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }

        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;

        $lunesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'L')->orderBy('Hora_inicio', 'asc')->get();
        $martesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'M')->orderBy('Hora_inicio', 'asc')->get();
        $miercolesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'X')->orderBy('Hora_inicio', 'asc')->get();
        $juevesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'J')->orderBy('Hora_inicio', 'asc')->get();
        $viernesHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'V')->orderBy('Hora_inicio', 'asc')->get();
        $sabadoHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'S')->orderBy('Hora_inicio', 'asc')->get();
        $domingoHorarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'D')->orderBy('Hora_inicio', 'asc')->get();
        return view('modificarHorarios', compact('lunesHorarios', $lunesHorarios, 'martesHorarios', $martesHorarios, 'miercolesHorarios', $miercolesHorarios, 'juevesHorarios', $juevesHorarios, 'viernesHorarios', $viernesHorarios, 'sabadoHorarios', $sabadoHorarios, 'domingoHorarios', $domingoHorarios));
    }


    public function precios(Request $request)
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }

        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;


        $conceptoArray=$request->input('Concepto');
        $holaArray=$request->input('Hola');
        $precioArray=$request->input('Precio');

        for ($i=0; $i < sizeof($conceptoArray); $i++) { 
            if($conceptoArray[$i]=='Otro')
            {
                $precios = new Precio();
                $precios->Descripcion=$holaArray[$i];
                $precios->Precio=$precioArray[$i];
                $precios->DoctorConsultorio=$doct_cons;
                $precios->save();
            }
            else
            {
                $precios = new Precio();
                $precios->Descripcion=$conceptoArray[$i];
                $precios->Precio=$precioArray[$i];
                $precios->DoctorConsultorio=$doct_cons;
                $precios->save();
            }
        }
        $revisiones=DB::table('doctor_consultorio')
        ->join('doctores', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->join('horario', 'horario.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->join('precios', 'precios.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->select('doctores.Nombre', 'doctores.Apellidos', 'doctores.FechaNacimiento', 'doctores.Correo', 'doctores.Registro')
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();

        
        if(!$revisiones->isEmpty())
        {
            $especialidades=Especialidad::select('*')->get();

            foreach ($especialidades as $especialidad) {
                $sugerencias=DB::table('sugerencias')
                ->join('usuarios', 'usuarios.Registro', '=', 'sugerencias.Usuario')
                ->select('usuarios.Nombre', 'usuarios.Apellidos', 'usuarios.Correo', 'sugerencias.Registro')
                ->where('sugerencias.Sugerencia', '=', $especialidad->Nombre)
                ->get();
                foreach ($sugerencias as $sugerencia) {
                    $nom = DB::table('sugerencias')
                    ->join('usuarios', 'usuarios.Registro', '=', 'sugerencias.Usuario')
                    ->select('usuarios.Nombre', 'usuarios.Apellidos', 'usuarios.Correo', 'sugerencias.Registro')
                    ->where('sugerencias.Registro', '=', $sugerencia->Registro)
                    ->take(1)->get();
                    $esp = Especialidad::select('Nombre')->where('Registro', '=', $especialidad->Registro)->take(1)->get();

                    $destinatario=$sugerencia->Correo;
                    Mail::to($destinatario)->send(new EspecialidadAgregada($nom, $esp));

                    Sugerencia::where('Registro', '=', $sugerencia->Registro)->delete();
                }

            }
        }


        return redirect('/');
        
    }





    public function visitantes(Request $request, $doctor, $consultorio)
    {
        $usuario=Doctor::select('Correo')->where('Registro', '=', $doctor)->take(1)->get();
        $usuario=$usuario[0]->Correo;

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
        ->join('consultorios', 'consultorios.Registro', '=', 'doctor_consultorio.Consultorio')
        ->select('doctores.*', 'consultorios.Nombre as Consultorio', 'consultorios.Registro as RegConsultorio')
        ->where('doctores.Correo', '=', $usuario)
        ->where('doctor_consultorio.Consultorio', '=', $consultorio)
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();


        $especialidades=DB::table('doctor_especialidad')->select('*')->where('Correo', '=', $usuario)->where('Doctor', '=', $doctor)->distinct()->get();


        $revisiones=DB::table('doctor_consultorio')
        ->join('doctores', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->join('horario', 'horario.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->join('precios', 'precios.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->select('doctores.Nombre', 'doctores.Apellidos', 'doctores.FechaNacimiento', 'doctores.Correo', 'doctores.Registro')
        ->where('doctor_consultorio.Doctor', '=', $doctor)->get();

        $precios=Precio::select('Descripcion', 'Precio', 'Registro')->where('DoctorConsultorio', '=', $doct_cons)->get();
 

        return view('paginaDoctor', compact('doctores', $doctores, 'especialidades', $especialidades, 'lunesHorarios', $lunesHorarios, 'martesHorarios', $martesHorarios, 'miercolesHorarios', $miercolesHorarios, 'juevesHorarios', $juevesHorarios, 'viernesHorarios', $viernesHorarios, 'sabadoHorarios', $sabadoHorarios, 'domingoHorarios', $domingoHorarios, 'revisiones', $revisiones, 'precios', $precios));
    }


    public function citas(Request $request, $doctor, $consultorio)
    {
        if(($request->session()->has('fechaCita')) && ($request->input('FechaCitas') == null))
        {
            $dia=$request->session()->get('fechaCita');
            $fecha = Carbon::createFromDate($dia);
            $request->session()->forget('fechaCita');
        }
        else
        {
            $partes = explode('/', $request->input('FechaCitas'));
            $dia = $partes[2].'-'.$partes[1].'-'.$partes[0];
            $fecha = Carbon::createFromDate($partes[2],$partes[1],$partes[0]);
        }

        $date = $fecha->format('l');

        $doct_cons = DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons = $doct_cons[0]->Registro;

        $citas = Cita::where('Fecha', '=', $dia)->where('DoctorConsultorio', '=', $doct_cons)->get();

        if($date == 'Monday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'L')->get();
        }
        else if($date == 'Tuesday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'M')->get();
        }
        else if($date == 'Wednesday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'X')->get();
        }
        else if($date == 'Thursday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'J')->get();
        }
        else if($date == 'Friday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'V')->get();
        }
        else if($date == 'Saturday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'S')->get();
        }
        else if($date == 'Sunday')
        {
            $horarios=Horario::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Dia', '=', 'D')->get();
        }



        if(!($citas->isEmpty()))
        {
            $contarHorarios = $horarios->count();
            $contarCitas = $citas->count();
            if($contarHorarios == $contarCitas)
            {
                return back()->withErrors(['No hay cupo' => 'Todos los horarios de este día han sido reservados ya']);
            }
        }

        if($horarios->isEmpty())
        {
            return back()->withErrors(['No hay horarios' => 'El doctor no trabaja este día, te sugerimos ver los horarios de atención que tiene']);
        }
        $doct_cons = DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();


        $request->session()->put('fechaCita', $dia);

        $doctor = Doctor::select('Correo')->where('Registro', '=', $doctor)->take(1)->get();
        
        return view('citasPacientes', compact('horarios', $horarios, 'citas', $citas, 'doct_cons', $doct_cons, 'doctor', $doctor));
    }


    public function vistaModificarInformacion(Request $request)
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        $doctores = Doctor::select('Correo', 'Telefono', 'Imagen', 'CorreoAsistente', 'CorreoRecuperacion')->where('Registro', '=', $doctor)->get();
        $especialidades = Especialidad::select('*')->get();
        $doct_especi = DB::table('doctor_especialidad')->where('Doctor', '=', $doctor)->get();
        return view('modificarDoctor', compact('doctores', $doctores, 'especialidades', $especialidades, 'doct_especi', $doct_especi));
    }




    public function eliminarEspecialidad(Request $request, $idEspecialidad)
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        
        Estudio::where('Doctor', '=', $doctor)->where('Especialidad', '=', $idEspecialidad)->delete();
        return back()->with(['mensaje' => 'Especialidad eliminada']);
    }




    public function modificarDoctor(Request $request)
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
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        $datosDoctor = Doctor::where('Registro', '=', $doctor)->get();
        
        $telefono = $request->input('Telefono');
        $correoRecuperacion = $request->input('CorreoRecuperacion');
        $correoAsistente = $request->input('CorreoAsistente');
        if($request->file('SubirFoto') != null)
        {
            $file = $request->file('SubirFoto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/avatar/', $name);
            $imagen=$name;
            Doctor::where('Registro', '=', $doctor)->update(array('Imagen'=>$imagen,));
            $imagenUsuario = Usuario::where('Correo', '=', $usuario)->get();

            $imagen = $datosDoctor[0]->Imagen;
            if($imagen != "mujer.png" && $imagen != "hombre.jpg" && $imagen != $imagenUsuario[0]->Imagen)
            {
                $file=public_path().'\avatar\\'.$imagen;
                unlink($file);
            }
        }
        if($request->input('Password') != null)
        {
            $password = Hash::make($request->input('Password'));
            Doctor::where('Registro', '=', $doctor)->update(array('Password'=>$password,));
        }

        Doctor::where('Registro', '=', $doctor)->update(array('Telefono'=>$telefono,));
        Doctor::where('Registro', '=', $doctor)->update(array('CorreoRecuperacion'=>$correoRecuperacion,));
        Doctor::where('Registro', '=', $doctor)->update(array('CorreoAsistente'=>$correoAsistente,));

        $partes=$request->input('Especialidad');

        if($partes[0] != "Especialidades"){
            for ($i=0; $i < sizeof($partes); $i++) { 
                $estudios = new Estudio();
                $estudios->Especialidad=$partes[$i];
                $estudios->Doctor=$doctor;
                $estudios->save();
            }
        }

        return back()->with(['mensaje' => 'Los cambios se han guardado']);
    }




    public function eliminarConcepto($idPrecio)
    {
        Precio::where('Registro', '=', $idPrecio)->delete();
        return back()->with(['mensaje' => 'Concepto eliminado']);
    }


    public function eliminarHorario($idHorario)
    {
        Horario::where('Registro', '=', $idHorario)->delete();
        return back()->with(['mensaje' => 'Hora eliminada']);
    }
}
