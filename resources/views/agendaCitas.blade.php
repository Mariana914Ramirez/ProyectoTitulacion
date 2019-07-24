@extends ('layouts.admin')
<?php 
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
            <h1>Citas generadas el día {{ Carbon::createFromDate($dias[0]->Fecha)->format('d-m-Y') }}</h1>
            <div style="width: 60%;">
                <table class="table table-striped" cellspacing="20px">
                    <tr style="text-align: center; font-size: 23px;">
                        <th scope="col">Información</th>
                        <th scope="col">Cancelar</th>
                    </tr>
                    @foreach($dias as $dia)
                        <tr style="text-align: center; font-size: 19px;">
                            <td align="left">
                                <b>Nombre: </b>{{ $dia->Nombre }}<br>
                                <b>Teléfono: </b>{{ $dia->Telefono }}<br>
                                @foreach($horarios as $horario)
                                    @if($horario->Registro == $dia->Horarios)
                                        <b>Horario: </b>{{ $horario->Hora_inicio }} - {{ $horario->Hora_termino }}<br>
                                    @endif
                                @endforeach
                                <b>Concepto: </b>{{ $dia->Concepto }}
                            </td>
                            <td>
                                <a href="{{ Session::get('saludaunclick') }}cita-cancelada/{{ $dia->Registro }}"><button class="btn btn-danger form-control">Cancelar</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </center>
    </section>

    
@stop