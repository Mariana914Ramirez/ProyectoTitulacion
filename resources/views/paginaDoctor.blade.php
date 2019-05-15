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
        <section class="FondoParallax" >
            <section class="parallax" style="background-image: url(img/bosque.jpg); height: 400px; margin-bottom: 0px;">
                <div align="center" style="margin-top: 75px;">
                    <p style="background: #333; width: 80%; color: #FFF; font-size: 35px;">{{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>

                    @foreach($especialidades as $especialidad)
                        <p style="background: #333; width: 50%; color: #FFF; font-size: 30px;">{{ $especialidad->Nombre }}</p>
                    @endforeach
                    <img src="/avatar/{{ $doctor->Imagen }}">
                </div>
            </section>
        </section>
    </section>

    <center>
        <section class="informacionCons" style="background: #CFA986; height: auto; padding: 20px;">
            <div class="card text-white mb-3" style="max-width: 70%; margin-top: 30px; align-content: center; padding: 20px; background: #444;">
                  <div class="card-header" style="font-size: 25px;">Información del doctor</div>
                  <div class="card-body" style="font-size: 20px;">
                        <p class="card-text">
                            <p><b>Nombre:</b> {{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>
                            <p><b>Edad:</b> {{ Carbon::parse($doctores[0]->FechaNacimiento)->age }} años</p>
                            <p><b>Correo de contacto:</b> {{ $doctor->Correo }}</p>
                            <p><b>Especialidades:</b><br>
                            @foreach($especialidades as $especialidad)    
                                {{ $especialidad->Nombre }}<br>
                            @endforeach
                            </p>
                        </p>
                  </div>
            </div>
        </section>
    
    <section style="background: #CFA986; height: auto; padding: 20px; width: 100%;">
        <div class="container">
            @if ((Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                <table style=" width: 90%;" class="table table-bordered table-dark formular" id="dynamic_field">
                    <thead style="font-size: 30px; text-align: center;">
                        <th colspan="7">Lunes</th>
                    </thead>
                    <tr style="font-size: 25px; text-align: center;">
                        <th colspan="2">Hora de inicio</th>
                        <th colspan="2">Hora de término</th>
                    </tr>
                    <tr style="font-size: 15px; text-align: center;">  
                        
                    </tr> 
                      
                </table>
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
