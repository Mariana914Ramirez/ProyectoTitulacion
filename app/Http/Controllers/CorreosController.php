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
use Illuminate\Support\Carbon;

class CorreosController extends Controller
{
    public function NoCumpleRequisitos($Registro, $Anuncio)
    {
        $imagen = Anuncio::where('Registro', '=', $Anuncio)->get();
        $imagen = $imagen[0]->Imagen;
        $file=public_path().'\slide\\'.$imagen;
        unlink($file);

    	$consultorio = Consultorio::select('Nombre', 'Correo')->where('Registro', '=', $Registro)->take(1)->get();
    	$destinatario = $consultorio[0]->Correo;
		Mail::to($destinatario)->send(new MandarMensajes($consultorio));

		DB::table('slide')->where('Registro', '=', $Anuncio)->delete();

		return back();
    }


    public function AgregarAnuncio($Registro, $Anuncio)
    {
    	$consultorio = Consultorio::select('Nombre', 'Correo')->where('Registro', '=', $Registro)->take(1)->get();
    	$destinatario = $consultorio[0]->Correo;

    	$fecha = Carbon::now();
        $fecha = $fecha->addDay(3);

        Anuncio::where('Registro', '=', $Anuncio)->update(array('Aceptado'=>1,));
        Anuncio::where('Registro', '=', $Anuncio)->update(array('FechaFinal'=>$fecha,));

		Mail::to($destinatario)->send(new AceptarAnuncio($consultorio));
		return redirect('/');
    }

}
