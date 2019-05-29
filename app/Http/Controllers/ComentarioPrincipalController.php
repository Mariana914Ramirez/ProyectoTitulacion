<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ComentarioPrincipalController;
use App\ComentarioPrincipal;
use App\Consultorio;
use App\Doctor;
use App\Usuario;
use App\Sugerencia;
use Illuminate\Support\Carbon;
use DB;

class ComentarioPrincipalController extends Controller
{
    public function index()
    {
    	
        $mandados=DB::table('comentariosprincipales')->select('*')->orderBy('Hora', 'desc')->paginate(10);
        return view('welcome', compact('mandados', $mandados));
    }  

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
        }
        else{
            return back()->withErrors(['NoRegistrado' => 'Debes tener una cuenta para realizar esta acción']);
        }

        $usuario=Usuario::select('Nombre', 'Apellidos', 'Registro')->where('Correo', '=', $usuario)->get();
        $usuarioRegistro=$usuario[0]->Registro;

         $hora = Carbon::now();

        $comentario_principal = new ComentarioPrincipal();
        $comentario_principal->Usuario=$usuarioRegistro;
        $comentario_principal->Comentario=$request->input('Comentarios');
        $comentario_principal->Hora=$hora;
        $comentario_principal->save();
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

    public function saveSugerencias(Request $request)
    {
        $comentario=$request->input('Comentarios');

        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
        }


        $usuario=Usuario::select('Nombre', 'Apellidos', 'Registro')->where('Correo', '=', $usuario)->get();
        $usuarioRegistro=$usuario[0]->Registro;

        $sugerencias = new Sugerencia();
        $sugerencias->Usuario=$usuarioRegistro;
        $sugerencias->Sugerencia=$comentario;
        $sugerencias->save();
        return redirect('/');
    }
}
