<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultorio;
use App\Especialidad;
use App\Usuario;
use App\Doctor;
use App\DoctorConsultorio;
use App\Estudio;
use App\Estado;
use App\Municipio;
use App\Imagen;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConsultorioController;
use Input;
use DB;
use Illuminate\Support\Collection as Collection;

class ConsultorioController extends Controller
{
    public function index()
    {
        $consultorios = Consultorio::orderBy('Puntos', 'asc')->paginate(10);
        return view('listadoConsultorios')->with('consultorios', $consultorios);

    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        //Errores

        $partes=$request->input('CorreoDoctor');
        for ($i=0; $i < sizeof($partes); $i++) { 
            if (!Usuario::where('Correo', '=', $partes[$i])->exists())
            {
                return back()->withErrors(['CorreoDoctor' => 'Todos los doctores del consultorio deben tener una cuenta']);
            }
        }
        $partes=$request->input('Secretaria');
        for ($i=0; $i < sizeof($partes); $i++) { 
            if (!Usuario::where('Correo', '=', $partes[$i])->exists())
            {
                return back()->withErrors(['CorreoAsistente' => 'Todos los asistentes de los doctores deben tener una cuenta']);
            }
        }

        $partes=$request->input('Correo');
        if (Consultorio::where('Correo', '=', $partes)->exists())
        {
            return back()->withErrors(['CorreoConsultorioexistente' => 'Un consultorio con este correo ya fue registrado. Ingrese otro correo']);
        }



        //Registro Consultorio

        $verificarEstado=$request->Estado;
        $verificarMunicipio=$request->Municipio;
        
        $consultorio = new Consultorio();
        $consultorio->Correo=$request->input('Correo');
        $consultorio->Estado=$verificarEstado;
        $consultorio->Municipio=$verificarMunicipio;
        $consultorio->Nombre=$request->input('Nombre');
        $consultorio->Telefono=$request->input('Telefono');
        $consultorio->Password=Hash::make($request->input('Password'));
        $consultorio->Ubicacion=$request->input('Ubicacion');
        $consultorio->Descripcion=$request->input('Comentarios');
        $consultorio->Puntos=10.0;
        $consultorio->C_precio=10.0;
        $consultorio->C_limpieza=10.0;
        $consultorio->C_puntualidad=10.0;
        $consultorio->C_trato=10.0;
        $consultorio->CorreoRecuperacion=$request->input('CorreoRecuperacion');
        $file = $request->file('SubirFoto');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/imagenesConsultorio/', $name);
        $consultorio->Imagen=$name;
        $consultorio->Revisado=0;
        $consultorio->save();


        //Registro doctores

        $partes=$request->input('CorreoDoctor');
        $experiencia=$request->input('Edad');
        $Asistente=$request->input('Secretaria');

        $correoConsultorio = $request->input('Correo');
        $id_consultorio=Consultorio::select('Registro')->where('Correo', '=', $correoConsultorio)->take(1)->get();
        $id_consultorio=$id_consultorio[0];
        $id_consultorio=$id_consultorio->Registro;

        $contadorEspecialidades=0;

        for ($i=0; $i < sizeof($partes); $i++) { 
            $datos_doctor=Usuario::select('*')->where('Correo', '=', $partes[$i])->take(1)->get();
            $id_datos=$datos_doctor[0];


            $doctor = new Doctor();
            $doctor->Correo=$partes[$i];
            $doctor->Nombre=$id_datos->Nombre;
            $doctor->Apellidos=$id_datos->Apellidos;
            $doctor->Experiencia=$experiencia[$i];
            $doctor->Telefono=$id_datos->Telefono;
            $doctor->Sexo=$id_datos->Sexo;
            $doctor->Password=$id_datos->Password;
            $doctor->CorreoRecuperacion=$id_datos->CorreoRecuperacion;
            $doctor->FechaNacimiento=$id_datos->FechaNacimiento;
            $doctor->CorreoAsistente=$Asistente[$i];
            $doctor->Imagen=$id_datos->Imagen;
            $doctor->save();


            //Registro Relación doctor-consultorio

            $datos_doctor=Doctor::select('Registro')->where('Correo', '=', $partes[$i])->orderBy('Registro', 'desc')->take(1)->get();
            $id_datos_doctor=$datos_doctor[0];

            $correo_consultorio=$request->input('Correo');
            $datos_consultorio=Consultorio::select('Registro')->where('Correo', '=', $correo_consultorio)->take(1)->get();
            $id_datos_consultorio=$datos_consultorio[0];

            $doctorConsultorio = new DoctorConsultorio();
            $doctorConsultorio->Consultorio=$id_datos_consultorio->Registro;
            $doctorConsultorio->Doctor=$id_datos_doctor->Registro;
            $doctorConsultorio->save();


    


            //Registro Estudios del doctor

            for ($j=0; $j < 3; $j++) { 
                $contadorInformacion=$contadorEspecialidades+$j;
                $nombre_especialidad=$request->input('Especialidad');
                if($nombre_especialidad[$contadorInformacion]!="Especialidades")
                {
                    $id_datos_especialidad=$nombre_especialidad[$contadorInformacion];

                    Especialidad::where('Registro', '=', $id_datos_especialidad)->update(array(
                         'Revision'=>1,));

                    $estudios = new Estudio();
                    $estudios->Especialidad=$id_datos_especialidad;
                    $estudios->Doctor=$id_datos_doctor->Registro;
                    $estudios->save();

                }
                
            }
            $contadorEspecialidades=$contadorEspecialidades+3;
            
        }

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
    public function getEspecialidad($Registro)
    {
        $consultorios = DB::table('consultorios_especialidades')->select('Nombre', 'Telefono', 'Ubicacion', 'Imagen', 'C_trato', 'C_puntualidad', 'C_limpieza', 'C_precio')->where('Especialidad', '=', $Registro)->distinct()->paginate(10);
        return view('listadoConsultorios', compact('consultorios', $consultorios));
       
    }


    public function cuenta(Request $request)
    {
       if ($request->session()->has('consultorioSession')) {
            $sesion=$request->session()->get('consultorioSession');
            $consultorio=$sesion[0]->Correo;
        }

        $consultorios=Consultorio::select('Imagen', 'Registro', 'Nombre', 'Telefono', 'Correo', 'Descripcion', 'Ubicacion', 'C_precio', 'C_limpieza', 'C_puntualidad', 'C_trato', 'Mes_uno', 'Mes_dos', 'Mes_tres', 'Mes_cuatro', 'Mes_cinco', 'Mes_seis', 'Estado', 'Municipio')->where('Correo', '=', $consultorio)->get();

        $estados=Estado::select('Nombre')->where('Registro', '=', $consultorios[0]->Estado)->get();
        $municipios=Municipio::select('Nombre')->where('Registro', '=', $consultorios[0]->Municipio)->get();

        $doctores=DB::table('doctores')
        ->join('doctor_consultorio', 'doctores.Registro', '=', 'doctor_consultorio.Doctor')
        ->select('doctores.Nombre', 'doctores.Apellidos', 'doctores.FechaNacimiento', 'doctores.Correo', 'doctores.Registro')
        ->where('doctor_consultorio.Consultorio', '=', $consultorios[0]->Registro)->get();

        $especialidades_doctores=DB::table('doctor_especialidad')
        ->select('*')->get();

        $especialidades=DB::table('consultorios_especialidades')->where('Consultorio', '=', $consultorios[0]->Registro)->distinct()->get();

        $fotos=Imagen::select('*')->where('Consultorio', '=', $consultorios[0]->Registro)->get();


        return view('paginaConsultorio', compact('consultorios', $consultorios, 'estados', $estados, 'municipios', $municipios, 'doctores', $doctores, 'especialidades', $especialidades, 'especialidades_doctores', $especialidades_doctores, 'fotos', $fotos));
    }

}
