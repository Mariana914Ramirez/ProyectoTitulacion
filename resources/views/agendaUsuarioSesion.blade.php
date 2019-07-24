@extends ('layouts.admin')
<?php 
        $mensaje = 0;
        use Illuminate\Support\Carbon;

    if(Request::session()->has('saludaunclick'))
    {
        Request::session()->forget('saludaunclick');
    }
    Request::session()->put('saludaunclick', 'http://localhost:8000/');
?>


@section ('contenido')

    <section id="content" class="Bienvenida" style="background: #EEE;">
        <center>
            <div style="width: 60%;">
                @if($citas->isEmpty())
                <h1>No hay citas</h1>
                @else
                    <div style="background: #B9E895; margin-top: 30px;">
                        <h4>Estás son las citas que usted ha generado, puede cancelarlas hasta 24 horas de anticipación</h4>
                    </div>
                    <table class="table table-striped" cellspacing="20px">
                        <tr style="text-align: center; font-size: 23px;">
                            <th scope="col">Información</th>
                            <th scope="col">Cancelar</th>
                        </tr>
                        @foreach($citas as $cita)
                            <tr style="text-align: center; font-size: 19px;">
                                <td align="left">

                                    <b>Día: </b>{{ Carbon::createFromDate($cita->Fecha)->format('d-m-Y') }}<br>
                                    @foreach($horarios as $horario)
                                        @if($horario->Registro == $cita->Horarios)
                                            <?php
                                                $hora = Carbon::createFromDate($cita->Fecha)->format('Y-m-d');
                                                $horaHorario = $horario->Hora_inicio;
                                                $horaCita = $hora.' '.$horaHorario;
                                                $horaCita = Carbon::createFromDate($horaCita);
                                                $horaActual = Carbon::now();

                                                $siguiente = $horaActual->addDay();
                                                
                                                if($siguiente > $horaCita)
                                                {
                                                    $mensaje = 1;
                                                }
                                            ?>
                                            <b>Horario: </b>{{ $horario->Hora_inicio }} - {{ $horario->Hora_termino }}<br>
                                        @endif
                                    @endforeach
                                    @foreach($doctores as $doctor)
                                        @foreach($doctoresConsultorios as $doctorConsultorio)
                                            @if(($doctor->Registro == $doctorConsultorio->Doctor) && ($doctorConsultorio->Registro == $cita->DoctorConsultorio))
                                                <b>Doctor: </b>{{ $doctor->Nombre }} {{ $doctor->Apellidos }}<br>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    @foreach($consultorios as $consultorio)
                                        @foreach($doctoresConsultorios as $doctorConsultorio)
                                            @if(($consultorio->Registro == $doctorConsultorio->Consultorio) && ($doctorConsultorio->Registro == $cita->DoctorConsultorio))
                                                <b>Consultorio: </b>{{ $consultorio->Nombre }}<br>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>
                                    @if($mensaje == 1)
                                        Ya no se puede cancelar
                                    @else
                                        <a href="{{ Session::get('saludaunclick') }}cancelar-confirmacion/{{ $cita->Registro }}"><button class="btn btn-success form-control">Cancelar</button></a>
                                    @endif
                                </td>
                            </tr>
                            <?php 
                                $mensaje = 0;
                            ?>
                        @endforeach
                    </table>
                @endif
            </div>
        </center>
    </section>

    
@stop