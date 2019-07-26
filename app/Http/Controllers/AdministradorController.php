<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdministradorController;
use App\Administrador;
use App\Anuncio;
use App\Sugerencia;
use Illuminate\Support\Facades\Hash;
use DB;
use Intervention\Image\Facades\Image;

class AdministradorController extends Controller
{
    public function index(Request $request)
    {
        $anuncios=DB::table('slide')
        ->join('consultorios', 'consultorios.Registro', '=', 'slide.Consultorio')
        ->select('slide.Imagen', 'consultorios.Correo', 'slide.FechaFinal', 'consultorios.Nombre', 'consultorios.Registro', 'slide.Registro as Slide')
        ->where('slide.Aceptado', '=', 0)
        ->orderBy('consultorios.puntos', 'desc')->get();


        $comentarios = DB::table('comentariosprincipal')
        ->join('usuarios', 'usuarios.Registro', '=', 'comentariosprincipal.Usuario')
        ->select('usuarios.Nombre', 'usuarios.Apellidos', 'usuarios.Imagen', 'comentariosprincipal.Comentario', 'comentariosprincipal.Hora')
        ->orderBy('Hora', 'desc')->get();

        $sugerencias = Sugerencia::select('*')->get();


    	return view('paginaAdministrador', compact('anuncios', $anuncios, 'comentarios', $comentarios, 'sugerencias', $sugerencias));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    	$admin = new Administrador();
        $admin->Correo=$request->input('Correo');
        $admin->Password=Hash::make($request->input('Password'));
        $admin->save();
    	return redirect('/');
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
