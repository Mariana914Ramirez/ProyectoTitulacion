<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagenController;
use App\Imagen;
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

}
