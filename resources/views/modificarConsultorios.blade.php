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
            <h1>Información del consultorio</h1>
            <div style="width: 80%;" align="left">
                <form action="{{ Session::get('saludaunclick') }}guardar-cambios-consultorio" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($consultorios as $consultorio)
                        <label><b>Nombre:</b></label>
                        <input type="text" name="Nombre" placeholder="Nombre" class="form-control" required value="{{ $consultorio->Nombre }}">
                        <br>
                        <label><b>Contraseña:</b></label>
                        <input type="password" name="Password" placeholder="Contraseña" class="form-control">
                        <br>
                        <label><b>Teléfono:</b></label>
                        <input type="text" name="Telefono" placeholder="Telefono" class="form-control" required value="{{ $consultorio->Telefono }}">
                        <br>
                        <label><b>Ubicación:</b></label>
                        <input type="text" name="Ubicacion" placeholder="Ubicación" class="form-control" required value="{{ $consultorio->Ubicacion }}">
                        <br>
                        <label><b>Correo de recuperación:</b></label>
                        <input type="text" name="CorreoRecuperacion" placeholder="Correo de recuperación" class="form-control" required value="{{ $consultorio->CorreoRecuperacion }}">
                        <br>
                        <label><b>Descripción:</b></label>
                        <textarea name="Descripcion" rows="5" class="form-control" placeholder="Descripción del consultorio" required>{{ $consultorio->Descripcion }}</textarea>
                        <br>

                        <div class="form-group" align="center">
                            <label for="file-upload" class="btn btn-success">
                                <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 25px;"></i> Cambiar la foto del consultorio
                            </label>
                            <input id="file-upload" onchange='cambiarModificar()' type="file" style='display: none; font-size: 25px;' id="SubirFoto" name="SubirFoto" style="font-size: 25px;"/>
                            <div id="info-modificar" style="font-size: 25px;"></div>
                        </div>

                        <br>
                        <br>
                        
                    @endforeach


                    <button type="button" name="addDoctores" id="addDoctores" class="btn btn-success form-control" style="width: 100%;">Agregar más doctores</button>
                    <table style=" width: 100%;" class="table table-bordered table-dark formular" id="dynamic_field_modificar">
                        <thead style="font-size: 25px; text-align: center;">
                            <th colspan="3">Información del doctor</th>
                            <th colspan="4">Especialidades</th>
                        </thead>
                        <tr style="font-size: 25px; text-align: center;">  
                             <td><p id="IconosDelRegistroLista"><input type="text" name="CorreoDoctor[]" placeholder="Correo del doctor" class="form-control"/></td> 
                             <td style="width: 13%;">
                                <p id="IconosDelRegistroLista"><input type="text" name="Edad[]" placeholder="Años experiencia" class="form-control"/>
                            </td>
                            <td>
                                <p id="IconosDelRegistroLista"><input type="text" name="Secretaria[]" placeholder="Correo secretaria(o)" class="form-control" />
                            </td>
                            <td>
                                <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad">
                                    <option>Especialidades</option>
                                     @foreach($especialidades as $especialidad)
                                        <option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad">
                                    <option>Especialidades</option>
                                     @foreach($especialidades as $especialidad)
                                        <option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>
                                    @endforeach
                                </select>
                            </td>
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
                        <th colspan="2" style="text-align: center; font-size: 20px;">Doctores del consultorio</th>
                    </thead>
                    <tbody>
                        @foreach($doct_cons as $dc)
                        <?php $doctor=Doctor::select('Nombre', 'Registro', 'Apellidos')->where('Registro', '=', $dc->Doctor)->get(); ?>
                        <tr>
                            <td style="width: 60%; align-content: center; text-align: center;">{{ $doctor[0]->Nombre }} {{ $doctor[0]->Apellidos }}</td>
                            <td style="align-content: center; text-align: center;"><button class="btn btn-danger" onclick="alerta('{{ Session::get('saludaunclick') }}eliminar-doctor/{{ $doctor[0]->Registro }}')">Eliminar doctor</button></td>
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
        function cambiarModificar(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info-modificar').innerHTML = pdrs;
    }
    </script>

    <script>  
     $(document).ready(function(){  


            var i=1, j=1; 
         $('#addDoctores').click(function(){  
               $('#dynamic_field_modificar').append('<tr id="row'+i+'">  <td><p id="IconosDelRegistroLista"><input type="text" name="CorreoDoctor[]" placeholder="Correo del doctor" class="form-control"/></td> <td style="width: 1%;"><p id="IconosDelRegistroLista"><input type="text" name="Edad[]" placeholder="Años experiencia" class="form-control"/></td><td><p id="IconosDelRegistroLista"><input type="text" name="Secretaria[]" placeholder="Correo secretaria" class="form-control" /></td> <td><select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option>@foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option> @endforeach</select></td><td><select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option>@foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>@endforeach</select></td><td> <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option> @foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>   ');  
               i++;
          });  

            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });  
        });  
    </script>
    
@stop