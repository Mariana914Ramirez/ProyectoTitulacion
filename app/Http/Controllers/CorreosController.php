<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MandarMensajes;
use App\Mail\AceptarAnuncio;
use App\Mail\EspecialidadAgregada;
use App\Consultorio;
use App\Anuncio;
use Illuminate\Support\Facades\Mail;
use DB;

class CorreosController extends Controller
{
    public function NoCumpleRequisitos($Registro, $Anuncio)
    {
    	$consultorio = Consultorio::select('Nombre', 'Correo')->where('Registro', '=', $Registro)->take(1)->get();
    	$destinatario = $consultorio[0]->Correo;
		Mail::to($destinatario)->send(new MandarMensajes($consultorio));

		DB::table('slide')->where('Registro', '=', $Anuncio)->delete();

		return redirect('/');
    }


    public function AgregarAnuncio($Registro, $Anuncio)
    {
    	$consultorio = Consultorio::select('Nombre', 'Correo')->where('Registro', '=', $Registro)->take(1)->get();
    	$destinatario = $consultorio[0]->Correo;

    	Anuncio::where('Registro', '=', $Anuncio)->update(array('Aceptado'=>1,));

		Mail::to($destinatario)->send(new AceptarAnuncio($consultorio));
		return redirect('/');
    }

}
