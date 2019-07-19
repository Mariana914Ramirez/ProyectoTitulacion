<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificacionController;
use App\Notificacion;
use App\Consultorio;
use App\Doctor;

class NotificacionController extends Controller
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
        else if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('administradorSession')) {
            $sesion=$request->session()->get('administradorSession');
            $usuario=$sesion[0]->Correo;
        }
        else
        {
        	return redirect('/');
        }


        $notificaciones = Notificacion::where('Receptor', '=', $usuario)->orderBy('Hora', 'desc')->get();

        $consultorios = Consultorio::select('Nombre', 'Imagen', 'Registro', 'Correo')->get();
        $doctores = Doctor::select('Nombre', 'Apellidos', 'Registro', 'Imagen', 'Correo')->get();


        return view('notificaciones', compact('notificaciones', $notificaciones, 'consultorios', $consultorios, 'doctores', $doctores));
    }
}
