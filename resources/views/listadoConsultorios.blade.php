@extends ('layouts.admin')

<?php

	if(Request::session()->has('saludaunclick'))
	{
	    Request::session()->forget('saludaunclick');
	}
	Request::session()->put('saludaunclick', 'http://localhost:8000/');

?>


@section ('contenido')
<section id="content" class="Bienvenida" style="background: #EEE;">
	<center>
		<div style="width: 90%;">
			
			<table class="table table-striped" style="width: 100%; background: #EEE;">
				<thead style="font-size: 40px; text-align: center;">
					@if($consultorios->isEmpty())
						<th>No hay consultorios</th>
					@else
					<th colspan="4">Consultorios</th>
					@endif
				</thead>
				<tbody style="font-size: 25px;">
					@foreach($consultorios as $consultorio)
						<tr>
							<td style="width: auto;" width="auto">
								<img src="{{ Session::get('saludaunclick') }}imagenesConsultorio/{{ $consultorio->Imagen }}" width="250px" height="200px">
							</td>
							<td>
								<p><b>Nombre:</b> {{ $consultorio->Nombre }}</p>
								<p><b>Calificación:</b> {{ (($consultorio->C_limpieza)+ ($consultorio->C_trato)+($consultorio->C_puntualidad)+($consultorio->C_precio))/4}}</p>
								
							</td>
							<td style="max-width: 25%;">
								<p><b>Teléfono:</b> {{ $consultorio->Telefono }}</p>
								<p style="max-width: 90%;"><b>Ubicación:</b> {{ $consultorio->Ubicacion }}</p>
							</td>
							<td>
								@if((Session::exists('consultorioSession')) && (((Session::get('consultorioSession'))[0]->Correo) == $consultorio->Correo))
									<a href="{{ Session::get('saludaunclick') }}cuentaConsultorio" class="btn btn-success form-control" style="height: 100%; width: 90%; margin-top: 40%;">Visitar Consultorio</a>
								@else
									<a href="{{ Session::get('saludaunclick') }}visitarConsultorio/{{ $consultorio->Registro }}" class="btn btn-success form-control" style="height: 100%; width: 90%; margin-top: 40%;">Visitar Consultorio</a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</center>
</section>
@stop
