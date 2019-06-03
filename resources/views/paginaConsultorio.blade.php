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
        <section class="FondoParallax" >
            <section class="parallax" style="background-image: url(img/tranquilidad.jpg); height: 400px; margin-bottom: 0px;">
                <div align="center" style="margin-top: 25px;">
                    <p style="background: #333; width: 80%; color: #FFF; font-size: 35px;">{{ $consultorio->Nombre }}</p>
                    <img src="imagenesConsultorio/{{ $consultorio->Imagen }}" width="350px" height="250px" style="border: solid;">
                </div>
            </section>
        </section>
    </section>

    <center>
        <section class="informacionCons bg-info" style=" height: auto; padding: 20px;">
            <div class="card text-white  mb-3" style="max-width: 70%; margin-top: 30px; background: #333; align-content: center; padding: 20px;">
                  <div class="card-header" style="font-size: 25px;">{{ $consultorio->Nombre }}</div>
                  <div class="card-body" style="font-size: 20px;">
                        <p class="card-text">{{ $consultorio->Descripcion }}</p>
                        <br>
                        <br>
                        <p><b>Correo: </b>{{ $consultorio->Correo }}</p>
                        <p><b>Ubicación: </b>{{ $consultorio->Ubicacion }}</p>
                        <p><b>Telefono: </b>{{ $consultorio->Telefono }}</p>
                        <p><b>Puntuación: </b>{{ (($consultorio->C_precio)+($consultorio->C_trato)+($consultorio->C_limpieza)+($consultorio->C_puntualidad))/4 }}</p>
                        <div style="font-size: 18px; width: auto;">
                            <li><b>Calificación de precio: </b>{{ $consultorio->C_precio }}</li>
                            <li><b>Calificación de trato al cliente: </b>{{ $consultorio->C_trato }}</li>
                            <li><b>Calificación de puntualidad: </b>{{ $consultorio->C_puntualidad }}</li>
                            <li><b>Calificación de limpieza: </b>{{ $consultorio->C_limpieza }}</li>
                        </div>
                        <br>
                        @foreach($estados as $estado)
                        <p><b>Estado: </b>{{ $estado->Nombre }}</p>
                        @endforeach
                        @foreach($municipios as $municipio)
                        <p><b>Municipio: </b>{{ $municipio->Nombre }}</p>
                        @endforeach
                        <br>
                        <p>
                            <b>Especialidades que se manejan:</b><br>
                            @foreach($especialidades as $especialidad)
                            <li>{{ $especialidad->Especialidad_Nom }}</li>
                            @endforeach
                        </p>


                        @if ((Session::exists('consultorioSession')))
                        <div align="right" style="margin-bottom: 0px;">
                            <a href=""><button style="align-content: center;" class="btn btn-light"><q class="icon-pencil"></q></button></a>
                        </div>
                        @endif
                  </div>
            </div>
        </section>


        <section class="FondoParallax">
            <section class="parallax" style="background-image: url(img/rocas.jpeg); margin-bottom: 0px;">
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
                                    <button class="btn btn-primary" style="width: 49%;">Ver citas</button>
                                    <button class="btn btn-danger" style="width: 49%;">Eliminar</button>
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
                            @else

                            <center>
                                <button class="icon-camera btn btn-success" data-toggle="modal" data-target="#ModalAgregarFoto" data-dismiss="modal">+ Agregar</button>
                            </center>
                              
                            <div class="tz-gallery">
                                @foreach($fotos as $foto)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <a class="lightbox" href="galeriaConsultorio/{{ $foto->Imagen }}">
                                            <img src="galeriaConsultorio/{{ $foto->Imagen }}" alt="Park" class="card-img-top" height="250px" style="float: right;">
                                            </a>
                                            <button class="btn btn-danger" style="float: right; position: absolute;">X Eliminar</button>
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