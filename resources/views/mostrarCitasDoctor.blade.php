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
            @if($citas->isEmpty())
                <h1>No hay citas</h1>
            @else
                <h1>Citas del doctor {{ $citas[0]->DoctorNombre }} {{ $citas[0]->Apellidos }}</h1>
                <div style="width: 60%;">
                    <table class="table table-striped" cellspacing="20px">
                        <tr style="text-align: center; font-size: 23px;">
                            <th scope="col">Información</th>
                        </tr>
                        @foreach($citas as $cita)
                            <tr style="text-align: center; font-size: 19px;">
                                <td align="left">
                                    <b>Fecha: </b>{{ Carbon::createFromDate($cita->Fecha)->format('d-m-Y') }}<br>
                                    <b>Nombre: </b>{{ $cita->NombreUsuario }}<br>
                                    <b>Teléfono: </b>{{ $cita->Telefono }}<br>
                                    <b>Horario: </b>{{ $cita->Hora_inicio }} - {{ $cita->Hora_termino }}<br>
                                    <b>Concepto: </b>{{ $cita->Concepto }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </center>
    </section>

    
@stop