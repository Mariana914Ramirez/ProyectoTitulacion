<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagenController;
use App\Imagen;
use App\Anuncio;
use App\Consultorio;
use Illuminate\Support\Facades\Hash;

class ImagenController extends Controller
{
    public function index()
    {	
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $consultorio=$request->input('consultorio');
        $file = $request->file('SubirFoto');
        $imagen = time().$file->getClientOriginalName();
        $file->move(public_path().'/galeriaConsultorio/', $imagen);

        $imagenes = new Imagen();
        $imagenes->Consultorio=$consultorio;
        $imagenes->Imagen=$imagen;
        $imagenes->save();
        return redirect('cuentaConsultorio');
    }

    public function show()
    {

    }
    public function edit()
    {
        dd('Hola cx');
    }
    public function update()
    {

    }
    public function destroy()
    {

    }


    public function anuncios(Request $request)
    {
        if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $consultorio=$sesion[0]->Correo;
        }

        $consultorios=Consultorio::select('Registro')->where('Correo', '=', $consultorio)->get();
        $consultorio=$consultorios[0]->Registro;

        $file = $request->file('SubirAnuncio');
        $imagen = time().$file->getClientOriginalName();
        $file->move(public_path().'/slide/', $imagen);

        
        $partes = explode('/', $request->input('FechaInicio'));
        $inicio = $partes[2].'-'.$partes[1].'-'.$partes[0];

        $partes = explode('/', $request->input('FechaTermino'));
        $termino = $partes[2].'-'.$partes[1].'-'.$partes[0];

        $anuncios = new Anuncio();
        $anuncios->Consultorio=$consultorio;
        $anuncios->Imagen=$imagen;
        $anuncios->FechaInicio=$inicio;
        $anuncios->FechaFinal=$termino;
        $anuncios->Aceptado=0;
        $anuncios->save();
        return redirect('/');
    }

}
