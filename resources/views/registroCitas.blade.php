@extends ('layouts.admin')
<?php 
        use Illuminate\Support\Carbon;
?>


@section ('contenido')

    <section id="content" class="Bienvenida" style="background: #EEE;">
        <center>
            <h1>Confirmación de datos para cita</h1>
            <div style="width: 60%;" align="left">
                <form action="http://127.0.0.1:8000/guardar-cita/{{ $horario[0]->Registro }}/{{ $doctorConsultorio[0]->Registro }}/{{ (Session::get('fechaCita')) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if((Session::exists('doctorSession')) || (Session::exists('asistenteSession')))
                        <p><b>Día: </b>{{ ((Carbon::createFromDate(Session::get('fechaCita')))->format('d-m-Y')) }}</p>
                        <p><b>Hora de inicio: </b>{{ $horario[0]->Hora_inicio }}</p>
                        <p><b>Hora de término: </b>{{ $horario[0]->Hora_termino }}</p>
                        <p><b>Doctor: </b>{{ $doctor[0]->Nombre }} {{ $doctor[0]->Apellidos }}</p>
                        <p><b>Consultorio: </b>{{ $consultorio[0]->Nombre }}</p>
                        <label><b>Paciente:</b></label>
                        <input type="text" name="Nombre" placeholder="Nombre" class="form-control">
                        <br>
                        <label><b>Teléfono:</b></label>
                        <input type="text" name="Nombre" placeholder="Telefono" class="form-control">
                        <br>
                        <label><b>Concepto:</b></label>
                        <select class="form-control" required>
                            <option>Elige</option>
                            @foreach($conceptos as $concepto)
                                <option>{{ $concepto->Descripcion }} ${{ $concepto->Precio }}</option>
                            @endforeach
                        </select>
                    @else
                        @foreach($usuarios as $usuario)
                            <p><b>Día: </b>{{ ((Carbon::createFromDate(Session::get('fechaCita')))->format('d-m-Y')) }}</p>
                            <p><b>Hora de inicio: </b>{{ $horario[0]->Hora_inicio }}</p>
                            <p><b>Hora de término: </b>{{ $horario[0]->Hora_termino }}</p>
                            <p><b>Doctor: </b>{{ $doctor[0]->Nombre }} {{ $doctor[0]->Apellidos }}</p>
                            <p><b>Consultorio: </b>{{ $consultorio[0]->Nombre }}</p>
                            <label><b>Paciente:</b></label>
                            <input type="text" name="Nombre" placeholder="Nombre" class="form-control" value="{{ $usuario->Nombre }} {{  $usuario->Apellidos }}">
                            <br>
                            <label><b>Teléfono:</b></label>
                            <input type="text" name="Telefono" placeholder="Telefono" class="form-control" value="{{ $usuario->Telefono }}">
                            @if($conceptos->count() > 1)
                            <br>
                            <label><b>Concepto:</b></label>
                            <select class="form-control" required name="Concepto">
                                <option>Elige</option>
                                @foreach($conceptos as $concepto)
                                    <option>{{ $concepto->Descripcion }} ${{ $concepto->Precio }}</option>
                                @endforeach
                            </select>
                            @else
                            <select style="display: none;" name="Concepto">
                                @foreach($conceptos as $concepto)
                                    <option>{{ $concepto->Descripcion }} ${{ $concepto->Precio }}</option>
                                @endforeach
                            </select>
                            @endif
                        @endforeach
                    @endif
                    <br>
                    <div align="center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                    </div>
                </form>
            </div>
        </center>
    </section>

    
@stop