<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Consultorio;
use App\Doctor;
use App\Usuario;
use App\Administrador;
use App\DoctorConsultorio;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $correo=Request::input('Correo');
        $password=Request::input('Password');
        if (Administrador::where('Correo', '=', $correo)->exists())
        {
            $comparar=Administrador::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Administrador::select('Correo', 'Registro')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    Request::session()->put('administradorSession', $sessionRegistrada);
                    return redirect('/');
                }
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }





        else if (Consultorio::where('Correo', '=', $correo)->exists())
        {
            $comparar=Consultorio::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Consultorio::select('Correo', 'Registro')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    Request::session()->put('consultorioSession', $sessionRegistrada);
                    return redirect('/');
                }
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }






        else if (Doctor::where('Correo', '=', $correo)->exists())
        {
            Session::put('url',Request::server('HTTP_REFERER')); 
            $comparar=Doctor::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                if(Doctor::where('CorreoAsistente', '=', $correo)->exists())
                {
                    return redirect('accedeOpciones/'.$correo);
                }
                return redirect('accede/'.$correo);
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }




        else if (Doctor::where('CorreoAsistente', '=', $correo)->exists())
        {
            Session::put('url',Request::server('HTTP_REFERER')); 
            $comparar=Usuario::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                return redirect('accedeA/'.$correo);
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }






        else if (Usuario::where('Correo', '=', $correo)->exists())
        {
            $comparar=Usuario::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Usuario::select('Correo', 'Registro')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    Request::session()->put('usuarioSession', $sessionRegistrada);
                    return redirect('/');
                }
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }
        else
        {
            return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
        }

    }





    public function logout(Request $request){

        if (Request::session()->has('administradorSession')) {
            Request::session()->forget('administradorSession');
        }
        if (Request::session()->has('consultorioSession')) {
            Request::session()->forget('consultorioSession');
        }
        if (Request::session()->has('doctorSession')) {
            Request::session()->forget('doctorSession');
        }
        if (Request::session()->has('asistenteSession')) {
            Request::session()->forget('asistenteSession');
        }
        if (Request::session()->has('usuarioSession')) {
            Request::session()->forget('usuarioSession');
        }

        
        return Redirect::to(Session::get('/'));  
    }




    public function accederComo($Correo){
        $hola=$Correo;

        $correos=Usuario::select('Correo')->where('Correo', '=', $hola)->get();
        return view('opcionesIngreso')->with('correos', $correos);
    }


    public function accederComoA($Correo){
        $hola=$Correo;

        $correos=Usuario::select('Correo')->where('Correo', '=', $hola)->get();
        return view('opcionesIngresoAsistente')->with('correos', $correos);
    }


    public function accederDoctor($Correo, Request $request){

        $cont=Doctor::where('Correo', '=', $Correo)->count();
        if($cont < 2)
        {
            $sessionRegistrada=DB::table('doctores')
            ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
            ->select('doctor_consultorio.Consultorio', 'doctores.Correo', 'doctores.Registro')
            ->where('doctores.Correo', '=', $Correo)->get();
            Request::session()->put('doctorSession', $sessionRegistrada);
            return Redirect::to(Session::get('url'));  
        }
        else
        {
            $contarConsultorios=DB::table('elegirconsultorio')->select('*')->where('Correo', '=', $Correo)->get();
            return view('opcionesConsultorios')->with('contarConsultorios', $contarConsultorios);
        }
    }


     public function accederAsistente($Correo, Request $request){
        $cont=Doctor::where('CorreoAsistente', '=', $Correo)->count();
        if($cont < 2)
        {
            $sessionRegistrada=DB::table('doctores')
            ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
            ->select('doctor_consultorio.Consultorio', 'doctores.Correo', 'doctores.Registro', 'doctores.CorreoAsistente')
            ->where('doctores.CorreoAsistente', '=', $Correo)->get();
            Request::session()->put('asistenteSession', $sessionRegistrada);
            return Redirect::to(Session::get('url'));  
        }
        else
        {
            $correos=DB::table('doctor_consultorio')
            ->join('doctores', 'doctor_consultorio.Doctor', '=', 'doctores.Registro')
            ->join('consultorios', 'doctor_consultorio.Consultorio', '=', 'consultorios.Registro')
            ->select('doctores.*', 'consultorios.Nombre as Consultorio')
            ->where('doctores.CorreoAsistente', '=', $Correo)->get();
            return view('opcionesIngresoElegirDoctor')->with('correos', $correos);
        }

    }


    public function accederUsuario($Correo, Request $request){

        $sessionRegistrada=Usuario::select('Correo')->where('Correo', '=', $Correo)->get();
        Request::session()->put('usuarioSession', $sessionRegistrada);
        return Redirect::to(Session::get('url'));  
    }


    public function volverAccederDoctor($Correo, $Registro, Request $request){

        $sessionRegistrada=DB::table('doctores')
        ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->select('doctor_consultorio.Consultorio', 'doctores.Correo', 'doctores.Registro')
        ->where('doctores.Correo', '=', $Correo)
        ->where('doctor_consultorio.Consultorio', '=', $Registro)->get();
        Request::session()->put('doctorSession', $sessionRegistrada);
        return Redirect::to(Session::get('url'));  
    }


    public function accedeAsis($Correo, $Registro, Request $request){

        $sessionRegistrada=DB::table('doctores')
        ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->select('doctor_consultorio.Consultorio', 'doctores.Correo', 'doctores.Registro', 'doctores.CorreoAsistente')
        ->where('doctores.CorreoAsistente', '=', $Correo)
        ->where('doctores.Registro', '=', $Registro)->get();
        Request::session()->put('asistenteSession', $sessionRegistrada);
        return Redirect::to(Session::get('url'));  
    }


    public function accederOpciones($Correo){

        $correos=Usuario::select('Correo')->where('Correo', '=', $Correo)->get();
        return view('opcionesIngresoTresOpciones')->with('correos', $correos);
    }
}
