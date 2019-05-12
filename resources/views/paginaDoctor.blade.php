@extends ('layouts.admin')

@section ('librerias')
	<link rel="stylesheet" type="text/css" href="css/estilos_consultorios.css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop

@section ('contenido')
	<section class="FotoPrincipalConsultorio">
        <section class="FondoParallax" >
            <section class="parallax" style="background-image: url(img/bosque.jpg); height: 400px; margin-bottom: 0px;">
                <div align="center" style="margin-top: 75px;">
                    <p style="background: #333; width: 80%; color: #FFF; font-size: 35px;">Nombre del Doctor</p>
                    <p style="background: #333; width: 50%; color: #FFF; font-size: 30px;">Especialidad1</p>
                    <p style="background: #333; width: 50%; color: #FFF; font-size: 30px;">Especialidad2</p>
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
                            <p>Nombre: Sr Doctor Profesor Patricio</p>
                            <p>Edad: 25 años</p>
                            <p>Correo de contacto: ejemplo25patricio@gmail.com</p>
                            <p>Especialidades: <br>Especialidad 1 <br>Especialidad 2</p>
                        </p>
                  </div>
            </div>
        </section>
    </center>
    <section style="background: #CFA986; height: auto; padding: 20px; width: 100%;">
        <div class="container">
            <form style="align-content: center;">
                <div class="form-group" >
                    <div class='input-group date' id='datepickes' >
                        <input type='text' placeholder="Fecha de cita" style="text-align: center; align-content: center; " />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </form>
            <div >
                <button class="btn btn-success" data-toggle="modal" data-target="#ModalVisualizarHorarios">Generar cita</button>
            </div>
        </div>
    </section>






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


    <script>
        baguetteBox.run('.tz-gallery');
    </script>
@stop