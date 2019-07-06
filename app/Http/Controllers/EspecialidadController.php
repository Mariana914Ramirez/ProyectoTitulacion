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
        $consultorios = DB::table('doctor_consultorio')
        ->join('consultorios', 'consultorios.Registro', '=', 'doctor_consultorio.Consultorio')
        ->join('horario', 'horario.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->join('precios', 'precios.DoctorConsultorio', '=', 'doctor_consultorio.Registro')
        ->select('consultorios.Registro')
        ->get();


        $especialidades = Especialidad::select('*')->get();
        foreach ($especialidades as $especialidad) {
            Especialidad::where('Registro', '=', $especialidad->Registro)->update(array('Revision'=>0,));
        }


        foreach ($consultorios as $consultorio) {

            $especialidades = DB::table('consultorios_especialidades')->select('*')->where('Consultorio', '=', $consultorio->Registro)->distinct()->get();
            foreach ($especialidades as $especialidad) {
                Especialidad::where('Registro', '=', $especialidad->Especialidad)->update(array('Revision'=>1,));
            }

        }

        
        $especialidades = Especialidad::select('*')->where('Revision', '=', 1)->orderBy('Nombre', 'asc')->paginate(10);
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
