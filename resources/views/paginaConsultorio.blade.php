@extends ('layouts.admin')
<?php
use Illuminate\Support\Carbon;
?>

@section ('librerias')
	<link rel="stylesheet" type="text/css" href="css/estilos_consultorios.css">
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop

@section ('contenido')
    @foreach($consultorios as $consultorio)
	<section class="FotoPrincipalConsultorio">
        <section class="FondoParallax" style="margin-bottom: 0px; background: #DDD;" >
            <section class="parallax" style="background-image: url(http://127.0.0.1:8000/img/fondo6.png); height: 500px; margin-bottom: 0px; opacity: 0.85;">
                <div align="center" style="margin-top: 0px;">
                    <p style="background: #EEE; width: 100%; color: #000; font-size: 35px; margin-bottom: 40px; font-weight: bolder;">{{ $consultorio->Nombre }}</p>
                    <img src="http://127.0.0.1:8000/imagenesConsultorio/{{ $consultorio->Imagen }}" width="450px" height="350px">
                </div>


                <center>
                @if((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                    @if($revisiones->isEmpty())
                    <div style="width: 80%; background: #DDD; margin-top: 30px; opacity: 0.95;">
                        <p style="font-size: 20px;">
                            Su consultorio aún no es visible para otros usuarios.
                            Para que todos los usuarios puedan acceder se necesita que los doctores de su consultorio configuren sus horarios y los precios de las consultas
                        </p>
                    </div>
                    @endif
                @endif
                </center>
            </section>
        </section>
    </section>

    <center>
        <section class="informacionCons Bienvenida" style=" height: auto; margin: 0px; padding: 0px; background: #000;">
            <section style="background-image: url(http://127.0.0.1:8000/img/fondo11.png); padding: 40px 40px 20px 20px; width: 100%; height: auto; opacity: 0.85;">

                <div style="color: #000; width: 100%; font-size: 20px;">
                    <div style="background: #BFD9FF; opacity: 0.7; width: 80%;">
                        <p style="font-size: 25px; opacity: 1.5; font-weight: bold;">{{ $consultorio->Nombre }}</p>
                        <p>{{ $consultorio->Descripcion }}</p>
                    </div>

                    <div style="background: #E2A2E8; opacity: 0.7; width: 80%;">
                        <p><b>Correo: </b>{{ $consultorio->Correo }}</p>
                        <p><b>Ubicación: </b>{{ $consultorio->Ubicacion }}</p>
                        @foreach($estados as $estado)
                        <p><b>Estado: </b>{{ $estado->Nombre }}</p>
                        @endforeach
                        @foreach($municipios as $municipio)
                        <p><b>Municipio: </b>{{ $municipio->Nombre }}</p>
                        @endforeach
                        <p><b>Telefono: </b>{{ $consultorio->Telefono }}</p>
                    </div>

                    <div style="background: #E8E3A2; opacity: 0.7; width: 80%;">
                        <p><b>Puntuación: </b>{{ (($consultorio->C_precio)+($consultorio->C_trato)+($consultorio->C_limpieza)+($consultorio->C_puntualidad))/4 }}</p>
                        <div style="font-size: 18px; width: auto;">
                            <li><b>Calificación de precio: </b>{{ $consultorio->C_precio }}</li>
                            <li><b>Calificación de trato al cliente: </b>{{ $consultorio->C_trato }}</li>
                            <li><b>Calificación de puntualidad: </b>{{ $consultorio->C_puntualidad }}</li>
                            <li><b>Calificación de limpieza: </b>{{ $consultorio->C_limpieza }}</li>
                        </div>
                    </div>

                    <br>
                    <div style="background: #B3FFCD; opacity: 0.7; width: 80%;">
                        <p>
                            <b>Especialidades que se manejan:</b><br>
                            @foreach($especialidades as $especialidad)
                            <li>{{ $especialidad->Especialidad_Nom }}</li>
                            @endforeach
                        </p>
                    </div>
                    
                </div>


                @if ((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                <div align="right" style="margin-bottom: 0px;">
                    <a href=""><button style="align-content: center;" class="btn btn-light"><q class="icon-pencil"></q></button></a>
                </div>
                @endif
            </section>
        </section>


        <section class="FondoParallax">
            <section class="parallax" style="background-image: url(http://127.0.0.1:8000/img/fondo7.png); margin-bottom: 0px;">
                <div class="row align-items-center">
                    @if ((Session::exists('consultorioSession')))
                    <button class="btn btn-info Botones col-md-2 offset-md-2  col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalCitas"><p class="icon-user-md" style="font-size: 50px;"></p><p style="font-weight: bolder;">Doctores<p></button>
                    <button class="btn btn-info Botones col-md-2 offset-md-1 col-sm-12 col-sm-12"><p class="icon-chart-bar-1" style="font-size: 50px;"></p><p style="font-weight: bolder;">Estadísticas<p></button>
                    @else
                    <button class="btn btn-info Botones col-md-2 offset-md-2  col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalCitas"><p class="icon-user-md" style="font-size: 50px;"></p><p style="font-weight: bolder;">Citas<p></button>
                    <button class="btn btn-info Botones col-md-2 offset-md-1 col-sm-12 col-sm-12"><p class="icon-users" style="font-size: 50px;"></p><p style="font-weight: bolder;">Comentarios<p></button>
                    @endif
                    <button class="btn btn-info Botones col-md-2 offset-md-1 col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalGaleria"><p class="icon-camera" style="font-size: 50px;"></p><p style="font-weight: bolder;">Galería<p></button>
                </div>

            </section>
        </section>

        <div style="background: #A7D8E8; padding-bottom: 30px;">
            <center>
                @foreach($consultorios as $consultorio)
                <table class="table table-dark" style="width: 100%;">
                    <thead style="font-size: 30px;">
                        <th colspan="3" style="padding-left: 20px;">Comentarios</th>
                    </thead>
                    @if ((Session::exists('doctorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||((Session::exists('consultorioSession'))&&((Session::get('consultorioSession'))[0]->Correo == $consultorios[0]->Correo)))
                    <tr>
                      <form action="http://127.0.0.1:8000/comentarConsultorios/{{ $consultorio->Registro }}" method="post">
                        @csrf
                        <td style="text-align: center;">
                          <p class="icon-heartbeat" style="width: 150px; height: 150px; font-size: 8vw;"></p>
                        </td>
                        <td style="width: 70%;">
                          <textarea name="Comentarios" rows="4" placeholder="Deja un comentario" style="font-size: 20px;" id="Comentarios" class="form-control" required></textarea>
                        </td>
                        <td style="width: 13%; align-content: center;">
                          <button type="submit" class="btn btn-success" >Comentar</button>
                        </td>
                      </form>
                    </tr>
                    @endif
                    @foreach($mandados as $mandar)
                    
                @if($mandar->Usuario==null)
                    @foreach($consultorios as $consultorio)
                    <tr>
                      <td style="width: 17%;">
                        <img src="/imagenesConsultorio/{{ $consultorio->Imagen }}" style="width: 150px; height: 150px;">
                      </td>
                      <td colspan="2">
                        <p><b style="font-size: 20px;">{{$consultorio->Nombre}}</b></p>
                        <p>{{$mandar->Comentario}}</p>


                          @if ((Session::exists('consultorioSession'))&& (Session::get('consultorioSession'))[0]->Correo==$consultorio->Correo)
                              <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                          @else
                            <br>
                          @endif

                        <i style="font-size: 13px;">Publicado: {{$mandar->Hora}}</i>
                      </td>
                    </tr>
                      @endforeach
                @else

                        @foreach($pacientesComentarios as $pacienteComentario)
                        @if($pacienteComentario->Registro == $mandar->Usuario)
                        <tr>
                          <td style="width: 17%;">
                            <img src="/avatar/{{ $pacienteComentario->Imagen }}" style="width: 150px; height: 150px;">
                          </td>
                          <td colspan="2">
                            <p><b style="font-size: 20px;">{{$pacienteComentario->Nombre}} {{$pacienteComentario->Apellidos}}</b></p>
                            <p>{{$mandar->Comentario}}</p>


                              @if (Session::exists('doctorSession'))
                                @if (((Session::get('doctorSession'))[0]->Correo) == $pacienteComentario->Correo)
                                  <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                                @else
                                  <br>
                                @endif
                              @elseif (Session::exists('usuarioSession'))
                                @if (((Session::get('usuarioSession'))[0]->Correo) == $pacienteComentario->Correo)
                                  <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                                @else
                                  <br>
                                @endif
                              @elseif (Session::exists('asistenteSession'))
                                @if (((Session::get('asistenteSession'))[0]->CorreoAsistente) == $pacienteComentario->Correo)
                                  <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                                @else
                                  <br>
                                @endif
                              @else
                                <br>
                              @endif

                            <i style="font-size: 13px;">Publicado: {{$mandar->Hora}}</i>
                          </td>
                        </tr>
                          @endif
                         @endforeach
                @endif
                    @endforeach

                </table>


                <div style="text-align:center;">
                    <div style="display:inline-block; margin:0 auto;">
                        {!!$mandados->render()!!}
                    </div>
                </div>
                @endforeach
            </center>
        </div>
        
    </center>

    <div class="modal fade" role="dialog" id="ModalCitas">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px;">
                <div class="modal-header">
                    <h3>Doctores del consultorio</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-citas">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctores as $doctor)
                            <tr>
                                <td>
                                    <p>
                                        <p>Nombre: {{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>
                                        <p>Edad: {{ Carbon::parse($doctores[0]->FechaNacimiento)->age }} años</p>
                                        <p>Correo de contacto: {{ $doctor->Correo }}</p>
                                        <p>Especialidades: <br>
                                            @foreach($especialidades_doctores as $especialidad_doctor)
                                                @if( $especialidad_doctor->Doctor == $doctor->Registro)
                                                <li>{{ $especialidad_doctor->Nombre }}</li>
                                                @endif
                                            @endforeach
                                        </p>
                                    </p>
                                    @if ((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                                    <button class="btn btn-primary" style="width: 49%;">Ver citas</button>
                                    <button class="btn btn-danger" style="width: 49%;">Eliminar</button>
                                    @else
                                        @if ((Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                                        <button class="btn btn-success" style="width: 49%;">Generar cita</button>
                                        @elseif(!(Session::exists('consultorioSession')))
                                        <button class="btn btn-success" style="width: 49%;" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Generar cita</button>
                                        @endif
                                        @if((Session::exists('consultorioSession')))
                                        <button class="btn btn-primary" style="width: 100%;">Ver más</button>
                                        @else
                                        <button class="btn btn-primary" style="width: 49%;">Ver más</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        <tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" role="dialog" id="ModalGaleria">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="modal-modales">
                    <div class="container">
                        <div class="container gallery-container" style="margin-bottom: 40px;">
                          
                            <h1 class="text-center" style="margin-top: 40px;">Imágenes</h1>

                            @if ($fotos->isEmpty())
                            <center>
                                <p>No hay fotos que mostrar</p>
                                @if ((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                                @foreach($consultorios as $consultorio)
                                <form action="imagenes" method="post" enctype="multipart/form-data">
                                @csrf
                                     <div class="form-group" align="center">
                                        <label for="file-upload" class="btn btn-success">
                                            <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 20px;"></i>+ Agregar
                                        </label>
                                        <input id="file-upload" onchange='cambiar()' type="file" style='display: none; font-size: 20px;' id="SubirFoto" name="SubirFoto" style="font-size: 20px;" required/>
                                        <div id="info" style="font-size: 20px;"></div>
                                    </div>
                                    <select style="display: none;" name="consultorio">
                                        <option value="{{$consultorio->Registro}}">{{$consultorio->Registro}}</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 40px; width: 70%;">Aceptar</button>
                                </form>
                                @endforeach
                                @endif
                            </center>
                            @else

                            @if ((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                            <center>
                                <button class="icon-camera btn btn-success" data-toggle="modal" data-target="#ModalAgregarFoto" data-dismiss="modal">+ Agregar</button>
                            </center>
                            @endif
                              
                            <div class="tz-gallery">
                                @foreach($fotos as $foto)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <a class="lightbox" href="http://127.0.0.1:8000/galeriaConsultorio/{{ $foto->Imagen }}">
                                            <img src="http://127.0.0.1:8000/galeriaConsultorio/{{ $foto->Imagen }}" alt="Park" class="card-img-top" height="250px" style="float: right;">
                                            </a>
                                            @if ((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
                                            <button class="btn btn-danger" style="float: right; position: absolute;">X Eliminar</button>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                @endforeach 
                            </div>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" role="dialog" id="ModalAgregarFoto">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="modal-modales">
                    <div class="container">
                        <div class="container gallery-container" style="margin-bottom: 40px;">
                          
                            <h1 class="text-center" style="margin-top: 40px;">Imágenes</h1>
                            <center>
                                @foreach($consultorios as $consultorio)
                                <form action="imagenes" method="post" enctype="multipart/form-data">
                                @csrf
                                     <div class="form-group" align="center">
                                        <label for="file-upload" class="btn btn-success">
                                            <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 20px;"></i>+ Agregar
                                        </label>
                                        <input id="file-upload" onchange='cambiar()' type="file" style='display: none; font-size: 20px;' id="SubirFoto" name="SubirFoto" style="font-size: 20px;" required/>
                                        <div id="info" style="font-size: 20px;"></div>
                                    </div>
                                    <select style="display: none;" name="consultorio">
                                        <option value="{{$consultorio->Registro}}">{{$consultorio->Registro}}</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 40px; width: 70%;">Aceptar</button>
                                </form>
                                @endforeach
                            </center>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@stop

@section ('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>


    <script>
        baguetteBox.run('.tz-gallery');
    </script>

@stop