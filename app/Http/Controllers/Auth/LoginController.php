<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Consultorio;
use App\Doctor;
use App\Usuario;
use App\Administrador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $correo=$request->input('Correo');
        $password=$request->input('Password');
        if (Administrador::where('Correo', '=', $correo)->exists())
        {
            $comparar=Administrador::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Administrador::select('Correo')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    $request->session()->put('administradorSession', $sessionRegistrada);
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
                $sessionRegistrada=Consultorio::select('Correo')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    $request->session()->put('consultorioSession', $sessionRegistrada);
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
            $comparar=Doctor::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Doctor::select('Correo')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    $request->session()->put('doctorSession', $sessionRegistrada);
                    return redirect('/');
                }
            }
            else
            {
                return back()->withErrors(['No existe usuario' => 'Algún dato es incorrecto, intenta de nuevo']);
            }
        }




        else if (Doctor::where('CorreoAsistente', '=', $correo)->exists())
        {
            $comparar=Usuario::select('Password')->where('Correo', '=', $correo)->get();
            $verificar=$comparar[0]->Password;
            if(Hash::check($password, $verificar))
            {
                $sessionRegistrada=Doctor::select('Correo')->where('CorreoAsistente', '=', $correo)->take(1)->get();
                if($_POST)
                {
                    $request->session()->put('asistenteSession', $sessionRegistrada);
                    return redirect('/');
                }
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
                $sessionRegistrada=Usuario::select('Correo')->where('Correo', '=', $correo)->get();
                if($_POST)
                {
                    $request->session()->put('consultorioSession', $sessionRegistrada);
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

        if ($request->session()->has('administradorSession')) {
            $request->session()->forget('administradorSession');
        }
        if ($request->session()->has('consultorioSession')) {
            $request->session()->forget('consultorioSession');
        }
        if ($request->session()->has('doctorSession')) {
            $request->session()->forget('doctorSession');
        }
        if ($request->session()->has('asistenteSession')) {
            $request->session()->forget('asistenteSession');
        }
        if ($request->session()->has('usuarioSession')) {
            $request->session()->forget('usuarioSession');
        }

        
        return redirect('/');
    }
}
