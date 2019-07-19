<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CalificacionController;
use App\Usuario;
use App\Consultorio;
use App\Notificacion;
use Illuminate\Support\Carbon;

class CalificacionController extends Controller
{
    public function index($idConsultorio, $idNotificacion)
    {
        $consultorios = Consultorio::select('Nombre', 'C_puntualidad', 'C_limpieza', 'C_trato', 'C_precio', 'Registro')->where('Registro', '=', $idConsultorio)->take(1)->get();
        $notificaciones = Notificacion::where('Registro', '=', $idNotificacion)->take(1)->get();
        
        return view('calificar', compact('consultorios', $consultorios, 'notificaciones', $notificaciones));
    }


    public function guardarCalificacion(Request $request, $idConsultorio, $idNotificacion)
    {
    	if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
            $registro=$sesion[0]->Registro;
        }
        else
        {
        	return redirect('/');
        }


        $consultorio = Consultorio::where('Registro', '=', $idConsultorio)->take(1)->get();

        $promedio = ($consultorio[0]->C_limpieza + $consultorio[0]->C_trato + $consultorio[0]->C_puntualidad + $consultorio[0]->C_precio)/4;
        $num = $consultorio[0]->CantidadPersonas;
        $operacion = $promedio*$num;

        $limpieza = $request->input('limpieza');
        $trato = $request->input('trato');
        $puntualidad = $request->input('puntualidad');
        $precio = $request->input('precio');

        $suma = ($limpieza + $trato + $puntualidad + $precio)/4;

        $suma_limpieza = $consultorio[0]->C_limpieza*$num;
        $suma_trato = $consultorio[0]->C_trato*$num;
        $suma_puntualidad = $consultorio[0]->C_puntualidad*$num;
        $suma_precio = $consultorio[0]->C_precio*$num;

        $num = $num + 1;
        $promedio = ($operacion + $suma)/$num;

        $limpieza = ($suma_limpieza + $limpieza)/$num;
        $trato = ($suma_trato + $trato)/$num;
        $puntualidad = ($suma_puntualidad + $puntualidad)/$num;
        $precio = ($suma_precio + $precio)/$num;

        Consultorio::where('Registro', '=', $idConsultorio)->update(array('CantidadPersonas'=>$num,));
        Consultorio::where('Registro', '=', $idConsultorio)->update(array('Puntos'=>$promedio,));
        Consultorio::where('Registro', '=', $idConsultorio)->update(array('C_limpieza'=>$limpieza,));
        Consultorio::where('Registro', '=', $idConsultorio)->update(array('C_trato'=>$trato,));
        Consultorio::where('Registro', '=', $idConsultorio)->update(array('C_puntualidad'=>$puntualidad,));
        Consultorio::where('Registro', '=', $idConsultorio)->update(array('C_precio'=>$precio,)); 

        Notificacion::where('Registro', '=', $idNotificacion)->update(array('UsuarioEmisor'=>"Revisado",));
        Notificacion::where('Registro', '=', $idNotificacion)->update(array('Notificacion'=>"Gracias por calificar",));

        $consultorio = Consultorio::select('Correo')->where('Registro', '=', $idConsultorio)->take(1)->get();
        $horaActual = Carbon::now();

        $notificacion = new Notificacion();
        $notificacion->Receptor = $consultorio[0]->Correo;
        $notificacion->Emisor = "Calificación";
        $notificacion->Notificacion = "Un paciente ha calificado tu consultorio. Te invitamos ver tus estadísticas";
        $notificacion->Hora = $horaActual;
        $notificacion->Visto = 0;
        $notificacion->UsuarioEmisor = "PacienteCalif";
        $notificacion->save();

        if($suma < 5)
        {
        	return redirect('mensaje-quejas/'.$notificacion->Registro.'/'.$idConsultorio);
        }

        return redirect('/')->with(['mensaje' => 'Gracias por calificar']);
    }


    public function mostrarQuejas($idNotificacion, $idConsultorio)
    {
        $notificaciones = Notificacion::where('Registro', '=', $idNotificacion)->take(1)->get();
        $consultorios = Consultorio::select('Nombre', 'Registro')->where('Registro', '=', $idConsultorio)->take(1)->get();
        
        return view('quejas', compact('notificaciones', $notificaciones, 'consultorios', $consultorios));
    }


    public function guardarQuejas(Request $request, $idNotificacion, $idConsultorio)
    {
        $comentarios = $request->input('Comentarios');
        Notificacion::where('Registro', '=', $idNotificacion)->update(array('Notificacion'=>$comentarios,));
        
        return redirect('/')->with(['mensaje' => 'Agradecemos su honestidad']);
    }

}
