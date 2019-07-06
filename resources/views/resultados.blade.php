@extends ('layouts.admin')
<?php
use Illuminate\Support\Carbon;
?>

@section ('contenido')

        <section id="content" class="Bienvenida" style="background: #EEE;">
            <center>
                <div style="width: 90%;">
                    <table class="table table-striped" style="width: 100%; background: #EEE;">
                        <tbody style="font-size: 25px;">
                                @foreach($consultorios as $consultorio)
                                    <tr>
                                        <td style="width: auto;" width="auto">
                                            <img src="/imagenesConsultorio/{{ $consultorio->Imagen }}" width="250px" height="200px">
                                        </td>
                                        <td>
                                            <p><b>Nombre:</b> {{ $consultorio->Nombre }}</p>
                                            <p><b>Calificación:</b> {{ (($consultorio->C_limpieza)+ ($consultorio->C_trato)+($consultorio->C_puntualidad)+($consultorio->C_precio))/4}}</p>
                                            
                                        </td>
                                        <td style="max-width: 25%;">
                                            <p><b>Teléfono:</b> {{ $consultorio->Telefono }}</p>
                                            <p style="max-width: 90%;"><b>Ubicación:</b> {{ $consultorio->Ubicacion }}</p>
                                        </td>
                                        <td><a href="" class="btn btn-success" style="height: 100%; width: 90%; margin-top: 40%; align-content: center;">Visitar Consultorio</a></td>
                                    </tr>
                                @endforeach

                                @foreach($doctores as $doctor)
                                    <tr>
                                        <td style="width: auto;" width="auto">
                                            <img src="/avatar/{{ $doctor->Imagen }}" width="250px" height="200px">
                                        </td>
                                        <td>
                                            <p>Consultorio: {{ $doctor->Consultorio }}</p>
                                            <p><b>Nombre:</b> {{ $doctor->Nombre }} {{ $doctor->Apellidos }}</p>
                                        </td>
                                        <td style="max-width: 25%;">
                                            <p><b>Correo:</b> {{ $doctor->Correo }}</p>
                                            <p><b>Edad:</b> {{ Carbon::parse($doctor->FechaNacimiento)->age }} años</p>
                                        </td>
                                        <td><a href="" class="btn btn-success" style="height: 100%; width: 90%; margin-top: 40%; padding: 20px;">Elegir</a></td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </center>
        </section>

@stop

