<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use App\Estudio;
use Illuminate\Support\Facades\Redirect;
use DB;

class EspecialidadController extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $especialidades = Especialidad::select('*')->get();

        foreach ($especialidades as $especialidad) {
            if(Estudio::where('Especialidad', '=', $especialidad->Registro)->exists())
            {
                Especialidad::where('Registro', '=', $especialidad->Registro)->update(array('Revision'=>1,));
            }
            else{
                Especialidad::where('Registro', '=', $especialidad->Registro)->update(array('Revision'=>0,));
            }
        }
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
