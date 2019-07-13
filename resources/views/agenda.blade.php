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
            </div>
        </center>
    </section>

    
@stop