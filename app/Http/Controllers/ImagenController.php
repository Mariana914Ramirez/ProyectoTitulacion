<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagenController;
use App\Imagen;
use App\Anuncio;
use App\Consultorio;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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
        if(Image::make($file)->height() != 550 || Image::make($file)->width() != 1050)
        {
            return back()->withErrors(['Anuncio' => 'El tamaño del anuncio no es el requerido']);
        }
        $imagen = time().$file->getClientOriginalName();
        $file->move(public_path().'/slide/', $imagen);


        $anuncios = new Anuncio();
        $anuncios->Consultorio=$consultorio;
        $anuncios->Imagen=$imagen;
        $anuncios->FechaFinal=null;
        $anuncios->Aceptado=0;
        $anuncios->save();
        return back()->with(['mensaje' => 'El anuncio se ha mandado satisfactoriamente']);
    }




    public function eliminarFotoGaleria($idFoto, Request $request)
    {
        if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $consultorio=$sesion[0]->Correo;


            $consultorios=Consultorio::select('Registro')->where('Correo', '=', $consultorio)->get();
            $imagen = Imagen::where('Registro', '=', $idFoto)->get();
            $imagen = $imagen[0]->Imagen;

            $file=public_path().'\galeriaConsultorio\\'.$imagen;
            unlink($file);

            Imagen::where('Registro', '=', $idFoto)->delete();

            return back()->with(['mensaje' => 'La imagen ha sido borrada']);
        }

    }

}
