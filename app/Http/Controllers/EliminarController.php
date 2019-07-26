<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EliminarController;
use App\Consultorio;
use App\DoctorConsultorio;
use App\Doctor;
use App\Anuncio;
use App\Precio;
use App\Notificacion;
use App\Imagen;
use App\Horario;
use App\Estudio;
use App\ComentarioConsultorio;
use App\Cita;
use App\Usuario;
use App\Administrador;
use App\Calificacion;
use App\ComentarioPrincipal;
use App\Sugerencia;
use App\Mail\EliminarConsultorio;
use App\Mail\EliminarDoctor;
use Illuminate\Support\Facades\Mail;
use DB;

class EliminarController extends Controller
{
    public function eliminarConsultorios($idConsultorio)
    {
    	$relacionCitasConsultorio = DB::table('relacioncitaconsultorio')->where('Registro', '=', $idConsultorio)->get();
    	if($relacionCitasConsultorio->isEmpty())
    	{
    		$relacionCitasConsultorio = null;
    	}
    	$consultorio = Consultorio::where('Registro', '=', $idConsultorio)->get();
    	$destinatario = $consultorio[0]->Correo;

    	Mail::to($destinatario)->send(new EliminarConsultorio($consultorio, $relacionCitasConsultorio));


    	$relaciones = DoctorConsultorio::where('Consultorio', '=', $idConsultorio)->get();
    	foreach ($relaciones as $relacion) {
    		Cita::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
    		Precio::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
    		Horario::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
    		Estudio::where('Doctor', '=', $relacion->Doctor)->delete();
    		$doctor = Doctor::where('Registro', '=', $relacion->Doctor)->get();

    		DoctorConsultorio::where('Registro', '=', $relacion->Registro)->delete();
    		Doctor::where('Registro', '=', $doctor[0]->Registro)->delete();
    	}

    	Notificacion::where('Receptor', '=', $destinatario)->delete();
    	Notificacion::where('Emisor', '=', $destinatario)->delete();
    	Anuncio::where('Consultorio', '=', $idConsultorio)->delete();
    	Imagen::where('Consultorio', '=', $idConsultorio)->delete();
    	ComentarioConsultorio::where('Consultorio', '=', $idConsultorio)->delete();
    	Calificacion::where('Consultorio', '=', $idConsultorio)->delete();

    	Consultorio::where('Registro', '=', $idConsultorio)->delete();

    	return redirect('/')->with(['mensaje' => 'Gracias por calificar']);
    }


    public function eliminarDoctor($idDoctor)
    {
        $datosDoctor = Doctor::where('Registro', '=', $idDoctor)->get();
        $imagenUsuario = Usuario::where('Correo', '=', $datosDoctor[0]->Correo)->get();
        $imagen = $datosDoctor[0]->Imagen;
        if($imagen != "mujer.png" && $imagen != "hombre.jpg" && $imagen != $imagenUsuario[0]->Imagen)
        {
            $file=public_path().'\avatar\\'.$imagen;
            unlink($file);
        }

        $relacionCitasConsultorio = DB::table('relacioncitaconsultorio')->where('IdRegistro', '=', $idDoctor)->get();

        $relaciones = DoctorConsultorio::where('Doctor', '=', $idDoctor)->get();
        if(!$relacionCitasConsultorio->isEmpty())
        {
            $consultorio = Consultorio::where('Registro', '=', $relaciones[0]->Consultorio)->get();
            $destinatario = $consultorio[0]->Correo;

            Mail::to($destinatario)->send(new EliminarDoctor($consultorio, $relacionCitasConsultorio));
        }

        Cita::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Precio::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Horario::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Estudio::where('Doctor', '=', $relaciones[0]->Doctor)->delete();
        $doctor = Doctor::where('Registro', '=', $relaciones[0]->Doctor)->get();

        DoctorConsultorio::where('Registro', '=', $relaciones[0]->Registro)->delete();
        Doctor::where('Registro', '=', $doctor[0]->Registro)->delete();

        return back()->with(['mensaje' => 'Doctor eliminado']);
    }



    public function eliminarCuentaConsultorio(Request $request)
    {
        if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $consultorio=$sesion[0]->Correo;


            $consultorio = Consultorio::where('Correo', '=', $consultorio)->get();
            $idConsultorio = $consultorio[0]->Registro;
            $destinatario = $consultorio[0]->Correo;
            $relaciones = DoctorConsultorio::where('Consultorio', '=', $idConsultorio)->get();
        foreach ($relaciones as $relacion) {
            Cita::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
            Precio::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
            Horario::where('DoctorConsultorio', '=', $relacion->Registro)->delete();
            Estudio::where('Doctor', '=', $relacion->Doctor)->delete();
            $doctor = Doctor::where('Registro', '=', $relacion->Doctor)->get();

            DoctorConsultorio::where('Registro', '=', $relacion->Registro)->delete();
            Doctor::where('Registro', '=', $doctor[0]->Registro)->delete();
        }

            Notificacion::where('Receptor', '=', $destinatario)->delete();
            Notificacion::where('Emisor', '=', $destinatario)->delete();
            Anuncio::where('Consultorio', '=', $idConsultorio)->delete();
            Imagen::where('Consultorio', '=', $idConsultorio)->delete();
            ComentarioConsultorio::where('Consultorio', '=', $idConsultorio)->delete();
            Calificacion::where('Consultorio', '=', $idConsultorio)->delete();

            $imagen = $consultorio[0]->Imagen;
            $file=public_path().'\imagenesConsultorio\\'.$imagen;
            unlink($file);

            $request->session()->forget('consultorioSession');

            Consultorio::where('Registro', '=', $idConsultorio)->delete();
            return redirect('/')->with(['mensaje' => 'El consultorio ha sido eliminado']);
        }
    }


    public function eliminarCuentaDoctor(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
            $request->session()->forget('doctorSession');
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
            $request->session()->forget('asistenteSession');
        }
        $datosDoctor = Doctor::where('Registro', '=', $doctor)->get();
        $imagenUsuario = Usuario::where('Correo', '=', $usuario)->get();
        $imagen = $datosDoctor[0]->Imagen;
        if($imagen != "mujer.png" && $imagen != "hombre.jpg" && $imagen != $imagenUsuario[0]->Imagen)
        {
            $file=public_path().'\avatar\\'.$imagen;
            unlink($file);
        }

        $idDoctor = $doctor;


        $relacionCitasConsultorio = DB::table('relacioncitaconsultorio')->where('IdRegistro', '=', $idDoctor)->get();

        $relaciones = DoctorConsultorio::where('Doctor', '=', $idDoctor)->get();
        if(!$relacionCitasConsultorio->isEmpty())
        {
            $consultorio = Consultorio::where('Registro', '=', $relaciones[0]->Consultorio)->get();
            $destinatario = $consultorio[0]->Correo;

            Mail::to($destinatario)->send(new EliminarDoctor($consultorio, $relacionCitasConsultorio));
        }

        Cita::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Precio::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Horario::where('DoctorConsultorio', '=', $relaciones[0]->Registro)->delete();
        Estudio::where('Doctor', '=', $relaciones[0]->Doctor)->delete();
        $doctor = Doctor::where('Registro', '=', $relaciones[0]->Doctor)->get();

        DoctorConsultorio::where('Registro', '=', $relaciones[0]->Registro)->delete();
        Doctor::where('Registro', '=', $doctor[0]->Registro)->delete();

        return redirect('/')->with(['mensaje' => 'Doctor eliminado']);
    }





    public function eliminarCuentaAdministrador(Request $request)
    {
        if ($request->session()->has('administradorSession')) {
            $sesion=$request->session()->get('administradorSession');
            $usuario=$sesion[0]->Correo;   

            $request->session()->forget('administradorSession');
            Administrador::where('Correo', '=', $usuario)->delete();
        }

        
        return redirect('/')->with(['mensaje' => 'Cuenta eliminada']);
    }



    public function eliminarCuentaUsuario(Request $request)
    {
        if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;   

            $datos = Usuario::where('Correo', '=', $usuario)->get();

            Cita::where('Usuario', '=', $datos[0]->Registro)->delete();
            ComentarioConsultorio::where('Usuario', '=', $datos[0]->Registro)->delete();
            ComentarioPrincipal::where('Usuario', '=', $datos[0]->Registro)->delete();
            Sugerencia::where('Usuario', '=', $datos[0]->Registro)->delete();
            Notificacion::where('Receptor', '=', $usuario)->delete();
            Notificacion::where('Emisor', '=', $usuario)->delete();

            $request->session()->forget('usuarioSession');
            Usuario::where('Correo', '=', $usuario)->delete();
        }

        
        return redirect('/')->with(['mensaje' => 'Cuenta eliminada']);
    }
}
