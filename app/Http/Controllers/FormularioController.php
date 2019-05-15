<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormularioController;
use App\Estado;
use App\Municipio;
use App\Especialidad;

class FormularioController extends Controller
{
	public function index(Request $request)
    {
    	$estados = Estado::all();
        $especialidades = Especialidad::select('*')->orderBy('Nombre', 'asc')->get();
    	return view('formularioConsultorio', compact('estados', $estados, 'especialidades', $especialidades));
    }
    public function getMunicipio(Request $request, $Registro)
    {
        if($request->ajax())
        {
            $municipio=Municipio::municipio($Registro);
            return response()->json($municipio);
        }
    }
    public function create()
    {
    	dd('Hola :3');
    }
    public function store(Request $request)
    {
        dd('Hola :3');
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
