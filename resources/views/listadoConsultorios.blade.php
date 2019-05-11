@extends ('layouts.admin')
@extends ('Formularios')


@section ('contenido')
<section id="content" class="Bienvenida">
	<center>
		<div style="width: 80%;">
			<table class="table table-dark" style="width: 100%;">
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
							<td><a href="" class="btn btn-info" style="height: 100%; width: 90%; margin-top: 40%;">Visitar Consultorio</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div style="text-align:center;">
			  <div style="display:inline-block; margin:0 auto;">
			    
			  </div>
			</div>
		</div>
	</center>
</section>
@stop
