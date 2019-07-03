@extends ('layouts.admin')
<?php
use Illuminate\Support\Carbon;
?>
@section ('librerias')
    <link rel="stylesheet" type="text/css" href="css/estilos_consultorios.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop

@section ('contenido')
@foreach($doctores as $doctor)
    <section class="FotoPrincipalConsultorio">
        <section class="FondoParallax" style="background: #BBB;">
            <section class="parallax" style="background-image: url(img/fondo7.png); height: 400px; margin-bottom: 0px;">
                <div align="center" style="margin-top: 0px;">
                    <p style="background: #DDD; width: 100%; color: #333; font-size: 35px;">{{ $doctor->Consultorio }}</p>
                    <p style="background: #5DBA4E; width: 100%; color: #333; font-size: 35px;">{{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>

                    <img src="/avatar/{{ $doctor->Imagen }}">
                </div>

                <center>
                    @if((Session::exists('doctorSession')))
                        @if($revisiones->isEmpty())
                        <div style="width: 80%; background: #DDD; margin-top: 30px; opacity: 0.95;">
                            <p style="font-size: 20px;">
                                Su página aún no es visible para otros usuarios.
                                Para que todos los usuarios puedan acceder y generar sus citas con usted, se necesita que cumpla lo siguiente: <br>
                                <ul style="font-size: 18px;">
                                    <li>Haber escrito los horarios de atención a cliente. Si usted aún no lo ha realizado puede hacerlo <a href="http://127.0.0.1:8000/modificarHorarios">Aquí</a></li>
                                    <li>Haber agregado los precios de sus consultas. Si usted aún no lo ha realizado puede hacerlo <a href="#" data-toggle="modal" data-target="#preciosModal">Aquí</a></li>
                                </ul>
                                
                            </p>      
                        </div>
                        @endif
                    @endif
                </center>
            </section>
        </section>
    </section>

    <center>
        <section style="height: auto; padding: 0px; margin-top: 0px; padding-top: 0px; margin-bottom: 0px; padding-bottom: 0px; background: #FFF;">
            <section style="background-image: url(img/fondo8.png); margin-bottom: 0px; padding-top: 40px; opacity: 0.75; width: 100%; padding-bottom: 40px;">

                <div style="background: #2E429E; opacity: 0.8; width: 70%; padding-top: 40px; margin-bottom: 40px; padding-bottom: 40px; font-size: 20px; color: #FFF;">
                    <h1 style="padding-top: 40px;"><b>{{ $doctor->Consultorio }}</b></h1>
                    <p>
                        <p><b>Nombre:</b> {{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>
                        <p><b>Edad:</b> {{ Carbon::parse($doctores[0]->FechaNacimiento)->age }} años</p>
                        <p><b>Correo de contacto:</b> {{ $doctor->Correo }}</p>
                        <p><b>Especialidades:</b><br>
                        @foreach($especialidades as $especialidad)    
                            {{ $especialidad->Nombre }}<br>
                        @endforeach
                        </p>
                    </p>

                    @if((Session::exists('doctorSession')))
                    <div style="padding: 5px;">
                    <button style="float: right; background: #1A9E25; color: #FFF; border: none; border-radius: 15px; font-size: 20px; padding: 5px;"><b class="icon-pencil"></b></button></div>
                    @endif
                </div>
            </section>



            
        </section>
    
    <section style="height: auto; padding: 20px; width: 100%; background: #DDD;">
        <div class="container">
            @if ((Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                @if (!$lunesHorarios->isEmpty())
                <table style=" width: 90%;" class="table table-bordered table-dark formular table table-striped" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Lunes</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($lunesHorarios as $luneshorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$luneshorario->Hora_inicio}}</td>
                        <td>{{$luneshorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif


                @if (!$martesHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Martes</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($martesHorarios as $marteshorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$marteshorario->Hora_inicio}}</td>
                        <td>{{$marteshorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif


                @if (!$miercolesHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Miércoles</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($miercolesHorarios as $miercoleshorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$miercoleshorario->Hora_inicio}}</td>
                        <td>{{$miercoleshorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif


                @if (!$juevesHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Jueves</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($juevesHorarios as $jueveshorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$jueveshorario->Hora_inicio}}</td>
                        <td>{{$jueveshorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif

                @if (!$viernesHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Viernes</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($viernesHorarios as $vierneshorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$vierneshorario->Hora_inicio}}</td>
                        <td>{{$vierneshorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif


                @if (!$sabadoHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Sabado</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($sabadoHorarios as $sabadohorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$sabadohorario->Hora_inicio}}</td>
                        <td>{{$sabadohorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif


                @if (!$domingoHorarios->isEmpty())
                <table style=" width: 90%; margin-top: 60px;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="2">Domingo</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th style="background: #5DBA4E;">Hora de inicio</th>
                        <th style="background: #6E69FF;">Hora de término</th>
                    </tr>
                    @foreach($domingoHorarios as $domingohorario)
                    <tr style="font-size: 15px; text-align: center;">  
                        <td>{{$domingohorario->Hora_inicio}}</td>
                        <td>{{$domingohorario->Hora_termino}}</td>
                    </tr> 
                    @endforeach
                      
                </table>
                @endif
            @else
            <form style="align-content: center;">
                <div class="form-group" style="text-align: center;">
                    <div class='input-group date' id='datepickes' style="display:inline-block; margin:0 auto;">
                        <input type='text' placeholder="Fecha de cita" style="text-align: center; align-content: center; " />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </form>
            <div style="align-content: center;">
                <button class="btn btn-success" data-toggle="modal" data-target="#ModalVisualizarHorarios" style="font-size: 20px;">Generar cita</button>
            </div>
            @endif
        </div>
    </section>
    </center>
    @endforeach



    <div class="modal fade" role="dialog" id="ModalVisualizarHorarios">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Horarios</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-horarios" style="padding: 10px;">
                    <center>
                        <table class="table table-striped" cellspacing="20px" >
                            <tr>
                                <th scope="col">Hora de llegada</th>
                                <th scope="col">Hora de salida</th>
                                <th scope="col">Generar cita</th>
                            </tr>

                            <tr>
                                <td>
                                    6:30 ejemplo
                                </td>
                                <td>
                                    7:00 ejemplo
                                </td>
                                <td>
                                    <button class="btn btn-success">Reservar</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    7:30 ejemplo
                                </td>
                                <td>
                                    8:00 ejemplo
                                </td>
                                <td>
                                    <button class="btn btn-success">Reservar</button>
                                </td>
                            </tr>
                        </table>
                    </center>
                </div>
            </div>
        </div>
    </div>
@stop

@section ('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>


@stop
