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
use App\Calificacion;
use App\Mail\EliminarConsultorio;
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
}
