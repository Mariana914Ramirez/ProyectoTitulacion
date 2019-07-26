@extends ('layouts.admin')
<?php 
        use Illuminate\Support\Carbon;
        use App\Doctor;

    if(Request::session()->has('saludaunclick'))
    {
        Request::session()->forget('saludaunclick');
    }
    Request::session()->put('saludaunclick', 'http://localhost:8000/');

?>


@section ('contenido')

    <section id="content" class="Bienvenida">
        <center>
            <h1>Información del doctor</h1>
            <div style="width: 80%;" align="left">
                <form action="{{ Session::get('saludaunclick') }}guardar-cambios-doctor" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($doctores as $doctor)
                        <label><b>Contraseña:</b></label>
                        <input type="password" name="Password" placeholder="Contraseña" class="form-control">
                        <br>
                        <label><b>Teléfono:</b></label>
                        <input type="text" name="Telefono" placeholder="Telefono" class="form-control" required value="{{ $doctor->Telefono }}">
                        <br>
                        <label><b>Correo de recuperación:</b></label>
                        <input type="text" name="CorreoRecuperacion" placeholder="Correo de recuperación" class="form-control" required value="{{ $doctor->CorreoRecuperacion }}">
                        <br>
                        <label><b>Correo de asistente:</b></label>
                        <input type="text" name="CorreoAsistente" placeholder="Correo de asistente" class="form-control" required value="{{ $doctor->CorreoAsistente }}">
                        <br>

                        <div class="form-group" align="center">
                            <label for="file-upload" class="btn btn-success">
                                <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 25px;"></i> Cambiar foto de perfil
                            </label>
                            <input id="file-upload" onchange='cambiarModificarDoctor()' type="file" style='display: none; font-size: 25px;' id="SubirFoto" name="SubirFoto" style="font-size: 25px;"/>
                            <div id="info-modificar-doctor" style="font-size: 25px;"></div>
                        </div>

                        <br>
                        <br>
                        
                    @endforeach


                    <button type="button" name="addEspecialidades" id="addEspecialidades" class="btn btn-success form-control" style="width: 100%;">Agregar más especialidades</button>
                    <table style=" width: 100%;" class="table table-bordered table-dark formular" id="dynamic_field_modificar_especialidades">
                        <thead style="font-size: 25px; text-align: center;">
                            <th colspan="2">Especialidades</th>
                        </thead>
                        <tr style="font-size: 25px; text-align: center;">  
                            <td>
                                <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad">
                                    <option>Especialidades</option>
                                     @foreach($especialidades as $especialidad)
                                        <option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr> 
                    </table>
                    <br>
                    <div align="center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>

                <br>
                <br>


                <table style="width: 100%;" class="table table-dark">
                    <thead>
                        <th colspan="2" style="text-align: center; font-size: 20px;">Especialidades que tiene</th>
                    </thead>
                    <tbody>
                        @foreach($doct_especi as $de)
                        <tr>
                            <td style="width: 60%; align-content: center; text-align: center;">{{ $de->Nombre }}</td>
                            <td style="align-content: center; text-align: center;"><button class="btn btn-danger" onclick="alerta('{{ Session::get('saludaunclick') }}eliminar-especialidad-doctor/{{ $de->Registro }}')">Eliminar</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <br>
            </div>
        </center>
    </section>

    
@stop





@section ('script')
    <script type="text/javascript">
        function cambiarModificarDoctor(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info-modificar-doctor').innerHTML = pdrs;
    }
    </script>



    <script>  
     $(document).ready(function(){  

            var i=1, j=1; 
         $('#addEspecialidades').click(function(){  
               $('#dynamic_field_modificar_especialidades').append('<tr id="row'+i+'" style="font-size: 25px; text-align: center;">  <td><select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option> @foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option> @endforeach</select> </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
               i++;
          });  

            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });  
        });  
    </script>
    
@stop