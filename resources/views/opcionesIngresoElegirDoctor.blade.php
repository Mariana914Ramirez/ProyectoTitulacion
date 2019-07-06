@extends ('layouts.admin')
<?php
use Illuminate\Support\Carbon;
?>

@section ('contenido')
<section id="content" class="Bienvenida" style="background: #EEE;">
	<center>
		<div style="width: 90%;">
			<h1><b>Elegir doctor...</b></h1>
			<table class="table table-striped" style="width: 100%; background: #EEE;">
				<tbody style="font-size: 25px;">
					@foreach($correos as $correo)
						<tr>
							<td style="width: auto;" width="auto">
								<img src="/avatar/{{ $correo->Imagen }}" width="250px" height="200px">
							</td>
							<td>
								<p>Consultorio: {{ $correo->Consultorio }}</p>
								<p><b>Nombre:</b> {{ $correo->Nombre }} {{ $correo->Apellidos }}</p>
							</td>
							<td style="max-width: 25%;">
								<p><b>Correo:</b> {{ $correo->Correo }}</p>
								<p><b>Edad:</b> {{ Carbon::parse($correo->FechaNacimiento)->age }} años</p>
							</td>
							<td><a href="http://127.0.0.1:8000/accedeAsis/{{$correo->CorreoAsistente}}/{{$correo->Registro}}" class="btn btn-success" style="height: 100%; width: 90%; margin-top: 40%; padding: 20px;">Elegir</a></td>
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
