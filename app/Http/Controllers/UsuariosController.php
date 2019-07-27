<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuariosController;
use App\Usuario;
use Illuminate\Support\Facades\Hash;



class UsuariosController extends Controller
{

    public function store(Request $request)
    {
        $usuario = new Usuario();
        if($request->file('SubirFoto')==null)
        {
            if($request->input('Sexo')=='f')
            {
                $imagen='mujer.png';
            }
            else
            {
                $imagen='hombre.jpg';
            }
        }
        else
        {
            $file = $request->file('SubirFoto');
            $imagen = time().$file->getClientOriginalName();
            $file->move(public_path().'/avatar/', $imagen);
        }
        $usuario->Correo=$request->input('Correo');
        $usuario->Nombre=$request->input('Nombre');
        $usuario->Apellidos=$request->input('Apellidos');
        $usuario->Telefono=$request->input('Telefono');
        $usuario->Sexo=$request->input('Sexo');
        $usuario->Password=Hash::make($request->input('Password'));
        $usuario->CorreoRecuperacion=$request->input('CorreoRecuperacion');
        $partes = explode('/', $request->input('FechaNacimiento'));
        $fecha = $partes[2].'-'.$partes[1].'-'.$partes[0];
        $usuario->FechaNacimiento=$fecha;
        $usuario->Imagen=$imagen;
        $usuario->save();

        $sessionRegistrada = Usuario::select('Correo', 'Registro')->where('Registro', '=', $usuario->Registro)->get();
        $request->session()->put('usuarioSession', $sessionRegistrada);

    	return redirect('/')->with(['mensaje' => 'Registro agregado']);
    }

    public function edit(Request $request)
    {
        if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;

            $usuarios = Usuario::select('Nombre', 'Apellidos', 'FechaNacimiento', 'Imagen', 'CorreoRecuperacion', 'Telefono')->where('Correo', '=', $usuario)->get();

            return view('modificarUsuario', compact('usuarios', $usuarios));
        }
    }


    public function guardarCambios(Request $request)
    {
        if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;

            $usuarios = Usuario::select('Registro')->where('Correo', '=', $usuario)->get();

            $telefono = $request->input('Telefono');
            $correoRecuperacion = $request->input('CorreoRecuperacion');
            $nombre = $request->input('Nombre');
            $apellidos = $request->input('Apellidos');
            if($request->file('SubirFoto') != null)
            {
                $file = $request->file('SubirFoto');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/avatar/', $name);
                Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('Imagen'=>$file,));
            }
            if($request->input('Password') != null)
            {
                $password = Hash::make($request->input('Password'));
                Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('Password'=>$password,));
            }

            Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('Telefono'=>$telefono,));
            Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('CorreoRecuperacion'=>$correoRecuperacion,));
            Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('Nombre'=>$nombre,));
            Usuario::where('Registro', '=', $usuarios[0]->Registro)->update(array('Apellidos'=>$apellidos,));

            return back()->with(['mensaje' => 'Los cambios se han guardado']);
        }
    }
}
