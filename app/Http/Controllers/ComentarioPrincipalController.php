<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ComentarioPrincipalController;
use App\ComentarioPrincipal;

class ComentarioPrincipalController extends Controller
{
    public function index()
    {
    	
        $mandar=ComentarioPrincipal::all();
        return view('welcome', compact($mandar));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
    	
        $comentario_principal = new ComentarioPrincipal();
        $consultorio->Estado=$verificarEstado;
        $consultorio->Correo=$request->input('Comentarios');
        $consultorio->Estado=$verificarEstado;
        $consultorio->Municipio=$verificarMunicipio;
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
