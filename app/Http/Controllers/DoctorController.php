<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DoctorController;
use App\Doctor;
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
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
        }

        
        $doctores=Doctor::select('*')->where('Correo', '=', $usuario)->get();
        $especialidades=DB::table('doctor_especialidad')->select('*')->where('Correo', '=', $usuario)->get();

    	return view('paginaDoctor', compact('doctores', $doctores, 'especialidades', $especialidades));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    	//return $request->all();
        $lunes = $request->input('LunesHora1');
        $lunesM = $request->input('LunesMinuto1');
        $lunesH2 = $request->input('LunesHora2');
        $lunesM2 = $request->input('LunesMinuto2');
        for ($i=0; $i < sizeof($lunes); $i++) { 
            if(!($lunes[$i]==0 && $lunesM[$i]==0 && $lunesH2[$i]==0 && $lunesM2[$i]==0))
            {
                $horaIni=$lunes[$i].":".$lunesM[$i].":00";
                return $horaIni;
            }
        }
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
