<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Especialidad;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Request\EspecialidadRequest;
use DB;

class EspecialidadController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $especialidades = Especialidad::select('*')->where('Revision', '=', 1)->orderBy('Registro', 'asc')->paginate(10);
        return view('listadoEspecialidades')->with('especialidades', $especialidades);

    }
    public function create()
    {

    }
    public function store()
    {

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
