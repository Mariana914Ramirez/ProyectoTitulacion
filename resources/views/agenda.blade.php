@extends ('layouts.admin')
<?php 
        use Illuminate\Support\Carbon;
?>


@section ('contenido')

    <section id="content" class="Bienvenida" style="background: #EEE;">
        <center>
            <div style="width: 60%;">
                @if($dias->isEmpty())
                <h1>No hay citas</h1>
                @else
                    <table class="table table-striped" cellspacing="20px">
                        <tr style="text-align: center; font-size: 23px;">
                            <th scope="col">Citas generadas</th>
                        </tr>
                        @foreach($dias as $dia)
                            <tr style="text-align: center; font-size: 19px;">
                                <td>
                                    <a href="http://127.0.0.1:8000/ver-citas/{{ $dia->Fecha }}" style="color: #000;">Citas del día {{ Carbon::createFromDate($dia->Fecha)->format('d-m-Y') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif

                @if(!$cancelados->isEmpty())
                    <div style="background: #B9E895; margin-top: 100px;">
                        <h4>Estás son las citas que usted ha cancelado, le sugerimos contactarlos para darles el aviso. Después de que realice esto presione en "Confirmar" para que desaparezcan de la lista</h4>
                    </div>
                    <table class="table table-striped" cellspacing="20px">
                        <tr style="text-align: center; font-size: 23px;">
                            <th scope="col">Información</th>
                            <th scope="col">Confirmar</th>
                        </tr>
                        @foreach($cancelados as $cancelado)
                            <tr style="text-align: center; font-size: 19px;">
                                <td align="left">
                                    <b>Nombre: </b>{{ $cancelado->Nombre }}<br>
                                    <b>Teléfono: </b>{{ $cancelado->Telefono }}<br>
                                    @foreach($horarios as $horario)
                                        @if($horario->Registro == $cancelado->Horarios)
                                            <b>Horario: </b>{{ $horario->Hora_inicio }} - {{ $horario->Hora_termino }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="http://127.0.0.1:8000/cancelar-confirmacion/{{ $cancelado->Registro }}"><button class="btn btn-success form-control">Confirmar</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </center>
    </section>

    
@stop