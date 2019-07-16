@extends ('layouts.admin')
<?php 

        $no = 0;
        $mensaje = 0;
        use Illuminate\Support\Carbon;

?>

@section ('contenido')

    <section id="content" class="Bienvenida" style="background: #EEE;">
        <center>
            <div style="width: 70%;">
                <h1>Horarios disponibles del día {{ ((Carbon::createFromDate(Session::get('fechaCita')))->format('d-m-Y')) }}</h1>
                <table class="table table-striped" cellspacing="20px" >
                    <tr>
                        <th scope="col">Hora de llegada</th>
                        <th scope="col">Hora de salida</th>
                        <th scope="col">Generar cita</th>
                    </tr>
                    @foreach($horarios as $horario)
                        @foreach($citas as $cita)
                            <?php 
                                if($cita->Horarios == $horario->Registro) 
                                {
                                    $no = $no+1;
                                }
                                else
                                {
                                    $no = $no+0;
                                }
                            ?>
                        @endforeach

                        <?php
                            $hora = (Carbon::createFromDate(Session::get('fechaCita')))->format('Y-m-d');
                            $horaHorario = $horario->Hora_inicio;
                            $horaCita = $hora.' '.$horaHorario;
                            $horaActual = Carbon::now()->format('Y-m-d H:i:s');

                            $horaInicio = new DateTime($horaActual);
                            $horaTermino = new DateTime($horaCita);

                            if($horaInicio > $horaTermino)
                            {
                                $mensaje = 1;
                            }
                        ?>
                        @if($no < 1)
                            <tr>
                                <td>
                                    {{ $horario->Hora_inicio }}
                                </td>
                                <td>
                                    {{ $horario->Hora_termino }}
                                </td>
                                @if($mensaje == 1)
                                <td>
                                    Esta hora ya no está disponible
                                </td>
                                @elseif(((Session::exists('doctorSession')) && (((Session::get('doctorSession'))[0]->Registro) == $doct_cons[0]->Doctor))||((Session::exists('usuarioSession')) && (((Session::get('usuarioSession'))[0]->Correo) != $doctor[0]->Correo))||((Session::exists('asistenteSession')) && (((Session::get('asistenteSession'))[0]->Registro) == $doct_cons[0]->Doctor)))
                                <td>
                                    <a href="http://127.0.0.1:8000/registro-cita/{{ $horario->Registro }}/{{ $doct_cons[0]->Registro }}/{{ (Session::get('fechaCita')) }}"><button class="btn btn-success">Reservar</button></a>
                                </td>
                                @elseif((Session::exists('consultorioSession'))||(Session::exists('administradorSession')) || ((Session::exists('doctorSession')) && (((Session::get('doctorSession'))[0]->Registro) != $doct_cons[0]->Doctor)) || ((Session::exists('asistenteSession')) && (((Session::get('asistenteSession'))[0]->Registro) != $doct_cons[0]->Doctor)) || ((Session::exists('usuarioSession')) && (((Session::get('usuarioSession'))[0]->Correo) == $doctor[0]->Correo))) 
                                <td>
                                    ---
                                </td>
                                @else
                                <td>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Reservar</button>
                                </td>
                                @endif
                            </tr>
                                
                        @endif

                        <?php 
                            $no=0;
                            $mensaje=0;
                        ?>
                        
                    @endforeach
                </table>
            </div>
        </center>
    </section>

    
@stop

