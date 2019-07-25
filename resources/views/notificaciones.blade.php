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
		<div style="width: 80%;">
			@if($notificaciones->isEmpty())
				<h1>No hay notificaciones</h1>
			@else
				<table class="table table-striped" style="width: 100%; background: #EEE;">
					<thead style="font-size: 40px; text-align: center;">
						<th colspan="4">Notificaciones</th>
					</thead>
					<tbody style="font-size: 25px;">
						@foreach($notificaciones as $notificacion)
							<tr>
								<td style="width: auto; @if($notificacion->Visto == 0) background: #8BC0EB; @endif padding: 40px;" width="auto">
									
									@foreach($consultorios as $consultorio)
										@if($consultorio->Correo == $notificacion->Emisor)
											<img src="{{ Session::get('saludaunclick') }}imagenesConsultorio/{{ $consultorio->Imagen }}" width="65px" height="50px">
											<a href="{{ Session::get('saludaunclick') }}visitarConsultorio/{{ $consultorio->Registro }}" style="color: #081BA8; font-size: 30px;">{{ $consultorio->Nombre }}</a>

											<br>

											<label>{{ $notificacion->Notificacion }}</label>

											<br>

											<div style="width: 100%; align-content: center; text-align: center;">
												@if($notificacion->UsuarioEmisor == "Calificar")
													<a href="{{ Session::get('saludaunclick') }}calificar/{{ $consultorio->Registro }}/{{ $notificacion->Registro }}"><button class="btn btn-success">Calificar</button></a>
												@elseif($notificacion->UsuarioEmisor == "Cancelar")
													<a href="{{ Session::get('saludaunclick') }}visitarConsultorio/{{ $consultorio->Registro }}"><button class="btn btn-success">Ver consultorio</button></a>
												@endif
											</div>

											<label style="font-size: 18px; float: right;">{{ Carbon::createFromDate($notificacion->Hora)->format('d-m-Y H:i') }}</label><br>
											<a href="eliminar-notificacion/{{ $notificacion->Registro }}" style="color: #FF5B5B;">Eliminar</a>

										@endif
									@endforeach


									@if($notificacion->UsuarioEmisor == "Sistema")
										<label style="color: #081BA8; font-size: 30px;">{{ $notificacion->Emisor }}</label>

										<br>

										<label>{{ $notificacion->Notificacion }}</label>

										<br>

										<div style="width: 100%; align-content: center; text-align: center;">
											<a href="{{ Session::get('saludaunclick') }}estadisticas/{{ (Session::get('consultorioSession'))[0]->Registro }}"><button class="btn btn-success">Estadísticas</button></a>
										</div>

										<label style="font-size: 18px; float: right;">{{ Carbon::createFromDate($notificacion->Hora)->format('d-m-Y H:i') }}</label>
										<a href="eliminar-notificacion/{{ $notificacion->Registro }}" style="color: #FF5B5B; font-size: 16px;">Eliminar</a>
									@endif

								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</center>
</section>

<?php

	use App\Notificacion;

	foreach ($notificaciones as $notificacion) {
       	Notificacion::where('Registro', '=', $notificacion->Registro)->update(array('Visto'=>1,));
    }

?>

@stop