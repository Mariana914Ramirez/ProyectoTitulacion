@extends ('layouts.admin')


@section ('contenido')
<section id="content" class="Bienvenida" style="background: #EEE;">
	<center>
		<div style="width: 80%;">
			<div style="background: ">
				
			</div>
			@foreach($consultorios as $consultorio)
				<form action="http://127.0.0.1:8000/guardar-quejas/{{ $notificaciones[0]->Registro }}/{{ $consultorio->Registro }}" class="formulario" method="post">
					@csrf
					<h2>Buzón de quejas {{ $consultorio->Nombre }}</h2>
					<br>
					<br>

					<div style="background: #B9E895; padding: 5px;">
					<h4>La calificación que usted dio al consultorio fue muy baja, nos gustaría conocer su experiencia para informarle en qué puede mejorar. Le pedimos que de la manera más respetuosa deje una pequeña crítica constructiva para el consultorio.<br>
						Este mensaje le llegará al consultorio, pero será de forma anónima, sus datos están completamente seguros<h4>
					</div>
					<br>

					<div class="form-group" style="background: #BBB; padding: 20px;">
	                    <textarea name="Comentarios" rows="5" class="form-control" placeholder="¿Deseas dejar algún comentario?" style="font-size: 20px; width: 90%;" id="Comentarios" required></textarea>
	                </div>


	                <br>
	                <button class="btn btn-success">Enviar opinión</button>
				</form>
			@endforeach
		</div>
	</center>
</section>

@stop