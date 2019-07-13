<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CitaController;
use App\Cita;
use App\Horario;
use App\DoctorConsultorio;
use App\Usuario;
use App\Precio;
use App\Doctor;
use App\Consultorio;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as Collection;
use DB;

class CitaController extends Controller
{
    public function registroCita(Request $request, $horario, $doctorConsultorio, $fecha)
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
        else if ($request->session()->has('usuarioSession')){
        	$sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }
        $conceptos = Precio::where('DoctorConsultorio', '=', $doctorConsultorio)->get();
    	$horario = Horario::where('Registro', '=', $horario)->take(1)->get();
    	$doctorConsultorio = DoctorConsultorio::where('Registro', '=', $doctorConsultorio)->take(1)->get();
    	$consultorio = $doctorConsultorio[0]->Consultorio;
    	$consultorio = Consultorio::where('Registro', '=', $consultorio)->take(1)->get();
    	$doctor = $doctorConsultorio[0]->Doctor;
    	$doctor = Doctor::where('Registro', '=', $doctor)->take(1)->get();
    	$usuarios = Usuario::where('Correo', '=', $usuario)->take(1)->get();


    	return view('registroCitas', compact('horario', $horario, 'doctorConsultorio', $doctorConsultorio, 'usuarios', $usuarios, 'conceptos', $conceptos, 'doctor', $doctor, 'consultorio', $consultorio));
    }

    public function guardarCita(Request $request, $horario, $doctorConsultorio, $fecha)
    {
    	$nombre = $request->input('Nombre');
    	$telefono = $request->input('Telefono');
    	$concepto = $request->input('Concepto');
        if($concepto == "Elige")
        {
            return back()->withErrors(['Concepto' => 'Selecciona una opción del campo Concepto']);
        }

    	$cita = new Cita();
        $cita->DoctorConsultorio=$doctorConsultorio;

        if ($request->session()->has('usuarioSession')){
        	$sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
            $usuario = Usuario::where('Correo', '=', $usuario)->take(1)->get();
            $cita->Usuario=$usuario[0]->Registro;
        }
    
        $cita->Horarios=$horario;
        $cita->Fecha=$fecha;
        $cita->Nombre=$nombre;
        $cita->Telefono=$telefono;
        $cita->Concepto=$concepto;
        $cita->Asistir=1;
        
        $cita->save();

        return redirect('/')->with(['mensaje' => 'Cita creada']);
    }


    public function index()
    {

    }
}
