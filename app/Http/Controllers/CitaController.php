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
use App\Notificacion;
use App\Mail\CitaCancelada;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
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
            $correo=$sesion[0]->Correo;
            $usuario = Usuario::where('Correo', '=', $correo)->take(1)->get();
            $cita->Usuario=$usuario[0]->Registro;
        }
    
        $cita->Horarios=$horario;
        $cita->Fecha=$fecha;
        $cita->Nombre=$nombre;
        $cita->Telefono=$telefono;
        $cita->Concepto=$concepto;
        $cita->Asistir=1;
        $cita->Google=null;
        $cita->save();



        $nombreConsultorio = DoctorConsultorio::where('Registro', '=', $cita->DoctorConsultorio)->take(1)->get();
        $correoDoctor = $nombreConsultorio[0]->Doctor;
        $correoDoctor = Doctor::select('Correo')->where('Registro', '=', $correoDoctor)->take(1)->get();
        $nombreConsultorio = $nombreConsultorio[0]->Consultorio;
        $nombreConsultorio = Consultorio::select('Nombre')->where('Registro', '=', $nombreConsultorio)->take(1)->get();
        $nombreConsultorio = $nombreConsultorio[0]->Nombre;
        $hora = Horario::where('Registro', '=', $cita->Horarios)->take(1)->get();
        $Fecha = Carbon::createFromDate($cita->Fecha)->format('Y-m-d');
        $horaString = $hora[0]->Hora_inicio;
        $horaString = Carbon::createFromDate($horaString)->format('H:i');

        $descripcion = 'Tiene una cita en el consultorio '.$nombreConsultorio.' a las '.$horaString;
        $titulo = 'Cita';
        $inicio = $Fecha.'T'.$hora[0]->Hora_inicio;
        $fin = $Fecha.'T'.$hora[0]->Hora_termino;
        $correoDoctor = $correoDoctor[0]->Correo;
        $request->session()->put('mexicanada', $correoDoctor);
        $cita=$cita->Registro;

        return redirect('guardar-google/'.$titulo.'/'.$descripcion.'/'.$inicio.'/'.$fin.'/'.$cita);
    }


    public function index(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }

        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;

        $dias = Cita::select('Fecha')->where('DoctorConsultorio', '=', $doct_cons)->where('Asistir', '=', 1)->distinct()->orderBy('Fecha', 'asc')->get();


        $cancelados = Cita::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Asistir', '=', 0)->get();
        $horarios = Horario::where('DoctorConsultorio', '=', $doct_cons)->orderBy('Hora_inicio', 'asc')->get();

        return view('agenda', compact('dias', $dias, 'cancelados', $cancelados, 'horarios', $horarios));
    }


    public function verCitas(Request $request, $fecha)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }

        $doct_cons=DoctorConsultorio::where('Doctor', '=', $doctor)->where('Consultorio', '=', $consultorio)->get();
        $doct_cons=$doct_cons[0]->Registro;

        $dias = Cita::select('*')->where('DoctorConsultorio', '=', $doct_cons)->where('Fecha', '=', $fecha)->where('Asistir', '=', 1)->get();
        $horarios = Horario::where('DoctorConsultorio', '=', $doct_cons)->orderBy('Hora_inicio', 'asc')->get();

        return view('agendaCitas', compact('dias', $dias, 'horarios', $horarios));
    }


    public function citaCancelada(Request $request, $idCita)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $consultorio=$sesion[0]->Consultorio;
            $doctor=$sesion[0]->Registro;
        }

        $cita = Cita::where('Registro', '=', $idCita)->get();
        $usuario = Usuario::select('Correo', 'Nombre', 'Apellidos')->where('Registro', '=', $cita[0]->Usuario)->take(1)->get();
        $destinatario = $usuario[0]->Correo;
        $doctor = Doctor::select('Nombre', 'Apellidos', 'Correo')->where('Registro', '=', $doctor)->take(1)->get();
        $consultorio = Consultorio::select('Nombre', 'Correo', 'Telefono')->where('Registro', '=', $consultorio)->take(1)->get();
        $horario = Horario::select('Hora_inicio')->where('Registro', '=', $cita[0]->Horarios)->take(1)->get();

        Mail::to($destinatario)->send(new CitaCancelada($usuario, $doctor, $consultorio, $horario));

        Cita::where('Registro', '=', $idCita)->update(array('Asistir'=>0,));

        $citados = Cita::where('Registro', '=', $idCita)->take(1)->get();


        //genera la notificación
        $usuario = Usuario::where('Correo', '=', $destinatario)->take(1)->get();
        
        $consultorio = Consultorio::where('Correo', '=', $consultorio[0]->Correo)->take(1)->get();
        $string = 'Hola '.$usuario[0]->Nombre.', le informamos que el consultorio '.$consultorio[0]->Nombre.' ha cancelado una cita, puede llamar a su número telefónico para más información: '.$consultorio[0]->Telefono.'.';

        $horaActual = Carbon::now();


        $notificacion = new Notificacion();
        $notificacion->Receptor = $usuario[0]->Correo;
        $notificacion->Emisor = $consultorio[0]->Correo;
        $notificacion->Notificacion = $string;
        $notificacion->Hora = $horaActual;
        $notificacion->Visto = 0;
        $notificacion->UsuarioEmisor = "Cancelar";
        $notificacion->save();                            

        $idEvent = $citados[0]->Google;
        $doctorConsultorio = $citados[0]->DoctorConsultorio;
        $fecha = $citados[0]->DoctorConsultorio;


        if($idEvent != null)
        {
            return redirect('google-eliminar-cita/'.$idEvent.'/'.$doctorConsultorio.'/'.$fecha);
        }
        else
        {
            if(Cita::select('*')->where('DoctorConsultorio', '=', $citados[0]->DoctorConsultorio)->where('Fecha', '=', $citados[0]->Fecha)->where('Asistir', '=', 1)->count() == 0)
            {
                return redirect('ver-agenda')->with(['mensaje' => 'Cita eliminada']);
            }
            return back()->with(['mensaje' => 'Cita eliminada']);
        }
    }



    public function confirmarCancelacion(Request $request, $idCita)
    {
        if($request->session()->has('doctorSession') || $request->session()->has('administadorSession'))
        {
            Cita::where('Registro', '=', $idCita)->delete();
            return back()->with(['mensaje' => 'Cita eliminada']);

        }
        $idEvent = Cita::where('Registro', '=', $idCita)->take(1)->get();
        $idEvent = $idEvent[0]->Google;
        Cita::where('Registro', '=', $idCita)->delete();

        if($idEvent != null)
        {
            return redirect('eliminar-cita-google/'.$idEvent);
        }
        else
        {
            return back()->with(['mensaje' => 'Cita eliminada']);
        }
    }


    public function verInformacionCitas(Request $request)
    {
        if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }

        $usuario = Usuario::where('Correo', '=', $usuario)->take(1)->get();
        $usuario = $usuario[0]->Registro;

        $citas = Cita::where('Usuario', '=', $usuario)->get();
        $horarios = Horario::select('*')->get();
        $doctores = Doctor::select('Nombre', 'Apellidos', 'Registro')->get();
        $consultorios = Consultorio::select('Nombre', 'Registro')->get();
        $doctoresConsultorios = DoctorConsultorio::select('*')->get();

        return view('agendaUsuarioSesion', compact('citas', $citas, 'horarios', $horarios, 'doctores', $doctores, 'consultorios', $consultorios, 'doctoresConsultorios', $doctoresConsultorios)); 
    }
}
