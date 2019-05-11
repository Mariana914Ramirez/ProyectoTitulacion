@extends ('layouts.admin')
@extends ('Formularios')

@section ('contenido')

<div class="modal-content" style="background: #80AEFF;">
    
    <center>
        <div>
            <p style="margin-top: 30px; margin-bottom: 30px; font-size: 30px;"><b>Registro de Consultorio</b></p>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" style="width: 70%;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="display: unset; font-size: 25px;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="consultorios" method="post" enctype="multipart/form-data">
            @csrf
            <div style="width: 70%; ">
            
                <div class="form-group" >
                    <input type="text" name="Nombre" placeholder="Nombre del Consultorio" class="form-control" id="Nombre"  style="font-size: 25px;" required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$" title="Al menos una mayúscula, una minúscula y un número. Mínimo 8 caracteres y máximo 20">
                </div>
                <div class="form-group">
                    <input type="email" name="Correo" class="form-control" placeholder="Correo Principal" id="Correo" style="font-size: 25px;" required>
                </div>
                <div class="form-group">
                    <input type="password" name="Password" class="form-control" placeholder="Contraseña" id="Password" style="font-size: 25px;" required>
                </div>
                <!--<div class="form-group">
                    <input type="password" name="PasswordRepetir" class="form-control" placeholder="Repetir contraseña">
                </div>-->
                
                <div class="form-group">
                    <input type="email" name="CorreoRecuperacion" placeholder="Correo de Recuperación" class="form-control" id="CorreoRecuperacion" style="font-size: 25px;" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="Telefono" placeholder="Teléfono" class="form-control" id="Telefono" style="font-size: 25px;" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="Estado" style="font-size: 25px;" name="Estado" placeholder="Estado" required>
                        <option>Estado</option>
                         @foreach($estados as $estado)
                        <option value="{{$estado->Registro}}">{{$estado->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="Municipio" style="font-size: 25px;" name="Municipio" placeholder="Muncipio" required>
                        <option>Municipio</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="Ubicacion" placeholder="Ubicación" class="form-control" style="font-size: 25px;" id="Ubicacion" required>
                </div>
                <div class="form-group" align="center">
                    <label for="file-upload" class="btn btn-success">
                        <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 25px;"></i> Subir foto del consultorio
                    </label>
                    <input id="file-upload" onchange='cambiar()' type="file" style='display: none; font-size: 25px;' id="SubirFoto" name="SubirFoto" style="font-size: 25px;" required/>
                    <div id="info" style="font-size: 25px;"></div>
                </div>

                <div class="form-group">
                    <textarea name="Comentarios" rows="5" class="form-control" placeholder="Descripción del consultorio" style="font-size: 25px;" id="Comentarios" required></textarea>
                </div>
                

            </div>


            <button type="button" name="add" id="add" class="btn btn-success form-control" style="width: 90%;">Agregar Doctor</button>
                <table style=" width: 90%;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 25px; text-align: center;">
                        <th colspan="3">Información del doctor</th>
                        <th colspan="4">Especialidades</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">  
                         <td><p id="IconosDelRegistroLista"><input type="text" name="CorreoDoctor[]" placeholder="Correo del doctor" class="form-control" required/></td> 
                         <td style="width: 13%;">
                            <p id="IconosDelRegistroLista"><input type="text" name="Edad[]" placeholder="Años experiencia" class="form-control" required/>
                        </td>
                        <td>
                            <p id="IconosDelRegistroLista"><input type="text" name="Secretaria[]" placeholder="Correo secretaria(o)" class="form-control" />
                        </td>
                        <td>
                            <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad" required>
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

        
            <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </center>
</div>
@stop


@section ('script')
    <!--<script src="js/jquery-3.4.0.min.js"></script>-->
    <script src="js/dropdown.js"></script>



    <script type="text/javascript">
        function cambiar(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
    </script>


    <script>  
     $(document).ready(function(){  


            var i=1, j=1; 
          $('#add').click(function(){  
               $('#dynamic_field').append('<tr id="row'+i+'">  <td><p id="IconosDelRegistroLista"><input type="text" name="CorreoDoctor[]" placeholder="Correo del doctor" class="form-control" required/></td> <td style="width: 1%;"><p id="IconosDelRegistroLista"><input type="text" name="Edad[]" placeholder="Años experiencia" class="form-control" required/></td><td><p id="IconosDelRegistroLista"><input type="text" name="Secretaria[]" placeholder="Correo secretaria" class="form-control" /></td> <td><select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad" required><option>Especialidades</option>@foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option> @endforeach</select></td><td><select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option>@foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>@endforeach</select></td><td> <select class="form-control" input type="text" name="Especialidad[]" placeholder="Especialidad"><option>Especialidades</option> @foreach($especialidades as $especialidad)<option value="{{$especialidad->Registro}}">{{$especialidad->Nombre}}</option>@endforeach</select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>   ');  
               i++;
          });  
          $('#addE').click(function(){  
           i++;  
           $('#dynamic_field').append('');  
            });

            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });  
        });  
    </script>
@stop
