<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ComentarioPrincipalController;
use App\ComentarioPrincipal;
use App\Consultorio;
use App\Doctor;
use App\Usuario;
use Illuminate\Support\Carbon;
use DB;

class ComentarioPrincipalController extends Controller
{
    public function index()
    {
    	
        $mandados=DB::table('comentariosprincipales')->select('*')->paginate(10);
        return view('welcome', compact('mandados', $mandados));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $usuario=$sesion[0]->Correo;
            $usuario=Consultorio::select('Nombre')->where('Correo', '=', $usuario)->get();
            $usuario=$usuario[0]->Nombre;
        }
        else if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
        }
        else if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
        }
        else{
            return back()->withErrors(['NoRegistrado' => 'Debes tener una cuenta para realizar esta acción']);
        }

        $usuario=Usuario::select('Nombre', 'Apellidos', 'Registro')->where('Correo', '=', $usuario)->get();
        $usuarioRegistro=$usuario[0]->Registro;
        $usuarioNombre=$usuario[0]->Nombre;
        $usuarioApellidos=$usuario[0]->Apellidos;
        $usuario=$usuarioNombre.' '.$usuarioApellidos;

         $hora = Carbon::now();
         //return $dt->format('H:i');
         //return $dt->format('Y-m-d');

         /*return $usuarioRegistro;
         return $request->input('Comentarios');
         return $hora;*/

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
}
