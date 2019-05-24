@extends ('layouts.admin')


@section ('contenido')
<section id="content" class="Bienvenida">
	<center>
		<div style="width: 80%;">
			<h1><b>Elegir consultorio...</b></h1>
			<table class="table table-dark" style="width: 100%;">
				<tbody style="font-size: 25px;">
					@foreach($contarConsultorios as $contarConsultorio)
						<tr>
							<td style="width: auto;" width="auto">
								<img src="/imagenesConsultorio/{{ $contarConsultorio->Imagen }}" width="250px" height="200px">
							</td>
							<td>
								<p><b>Nombre:</b> {{ $contarConsultorio->Nombre }}</p>
								
							</td>
							<td style="max-width: 25%;">
								<p><b>Teléfono:</b> {{ $contarConsultorio->Telefono }}</p>
								<p style="max-width: 90%;"><b>Ubicación:</b> {{ $contarConsultorio->Ubicacion }}</p>
							</td>
							<td><a href="http://127.0.0.1:8000/accedeDoctorConsultorio/{{$contarConsultorio->Correo}}/{{$contarConsultorio->id_consultorio}}/{{$contarConsultorio->id_doctor}}" class="btn btn-info" style="height: 100%; width: 90%; margin-top: 40%; padding: 20px;">Elegir</a></td>
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
