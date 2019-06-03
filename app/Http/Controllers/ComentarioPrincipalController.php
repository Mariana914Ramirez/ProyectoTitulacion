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
use App\Administrador;
use App\Estado;
use App\Municipio;
use App\Especialidad;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as Collection;
use DB;

class ComentarioPrincipalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('doctorSession')) {
            $sesion=$request->session()->get('doctorSession');
            $usuario=$sesion[0]->Correo;
            $nombres=Usuario::select('Nombre')->where('Correo', '=', $usuario)->distinct()->get();
        }
        else if ($request->session()->has('asistenteSession')) {
            $sesion=$request->session()->get('asistenteSession');
            $usuario=$sesion[0]->Correo;
            $nombres=Usuario::select('Nombre')->where('Correo', '=', $usuario)->distinct()->get();
        }
        else if ($request->session()->has('usuarioSession')) {
            $sesion=$request->session()->get('usuarioSession');
            $usuario=$sesion[0]->Correo;
            $nombres=Usuario::select('Nombre')->where('Correo', '=', $usuario)->distinct()->get();
        }
        else if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $usuario=$sesion[0]->Correo;
            $nombres=Consultorio::select('Nombre')->where('Correo', '=', $usuario)->distinct()->get();
        }
        else
        {
            $nombres=null;
        }
    	
        $mandados=DB::table('comentariosprincipales')->select('*')->orderBy('Hora', 'desc')->paginate(10);
        return view('welcome', compact('mandados', $mandados, 'nombres', $nombres));
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


    public function buscador(Request $request)
    {
        $buscar=$request->input('buscador');

        $consultorios=Consultorio::select('Registro', 'Nombre', 'Telefono', 'Ubicacion', 'Imagen', 'C_trato', 'C_puntualidad', 'C_limpieza', 'C_precio')->where('Nombre', '=', $buscar)->orWhere('Correo', '=', $buscar)->orderBy('Puntos', 'asc')->get();

        $doctores=DB::table('doctor_consultorio')
            ->join('doctores', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
            ->join('consultorios', 'consultorios.Registro', '=', 'doctor_consultorio.Consultorio')
            ->select('doctor_consultorio.Consultorio', 'doctores.Correo', 'doctores.Registro', 'doctores.FechaNacimiento', 'consultorios.Nombre as Consultorio', 'doctores.Imagen', 'doctores.Nombre', 'doctores.Apellidos')->where('doctores.Nombre', '=', $buscar)->orWhere('doctores.Correo', '=', $buscar)->get();

        $especialidades=Especialidad::select('Nombre', 'Registro')->where('Nombre', '=', $buscar)->where('Revision', '=', 1)->get();

        $estados=Estado::select('Nombre', 'Registro')->where('Nombre', '=', $buscar)->get();
        $municipios=Municipio::select('Nombre', 'Registro')->where('Nombre', '=', $buscar)->get();
        if(!$estados->isEmpty())
        {
            $consultorios=Consultorio::select('Registro', 'Nombre', 'Telefono', 'Ubicacion', 'Imagen', 'C_trato', 'C_puntualidad', 'C_limpieza', 'C_precio')->where('Estado', '=', $estados[0]->Registro)->orderBy('Puntos', 'asc')->get();
        }
        else if(!$municipios->isEmpty())
        {
            $consultorios=Consultorio::select('Registro', 'Nombre', 'Telefono', 'Ubicacion', 'Imagen', 'C_trato', 'C_puntualidad', 'C_limpieza', 'C_precio')->where('Municipio', '=', $municipios[0]->Registro)->orderBy('Puntos', 'asc')->get();
        }
        else if(!$especialidades->isEmpty())
        {
            $consultorios=DB::table('consultorios_especialidades')->select('Consultorio as Registro', 'Nombre', 'Telefono', 'Ubicacion', 'Imagen', 'C_trato', 'C_puntualidad', 'C_limpieza', 'C_precio')->where('Especialidad', '=', $especialidades[0]->Registro)->orderBy('Puntos', 'asc')->distinct()->get();
        }


        if($estados->isEmpty()&&$municipios->isEmpty()&&$especialidades->isEmpty()&&$consultorios->isEmpty()&&$doctores->isEmpty())
        {
            return redirect('/')->withErrors(['NoSeEncuentra' => 'No se encontró ningún resultado']);
        }

        return view('resultados', compact('consultorios', $consultorios, 'doctores', $doctores));
    }
}
