<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request as HttpRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UsuariosController;
use App\Usuario;
use Illuminate\Support\Facades\Hash;



class UsuariosController extends Controller
{

    public function index()
    {
    	
        dd('holitas');
    }

    public function create()
    {
        dd('holitas');
    	//require_once 'resources/views/usuario/registro.php'; //ve al formulario
    }

    public function store(Request $request)
    {
        $usuario = new Usuario();
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
        $usuario->save();
    	return view('welcome');
    }

    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
