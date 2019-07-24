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
		<div style="width: 80%;">
			<div style="background: ">
				
			</div>
			@foreach($consultorios as $consultorio)
				<form action="{{ Session::get('saludaunclick') }}guardar-calificacion/{{ $consultorio->Registro }}/{{ $notificaciones[0]->Registro }}" class="formulario" method="post">
					@csrf
					<h2>Califica al consultorio {{ $consultorio->Nombre }}</h2>
					<br>
					<label style="font-size: 20px;">Del 1 al 10 ¿Qué tan limpio encontraste el consultorio?</label><br>
					<div class="radio" style="font-size: 20px;">
						<input type="radio" name="limpieza" id="l1" value="1" required><label for="l1">1</label>
						<input type="radio" name="limpieza" id="l2" value="2"><label for="l2">2</label>
						<input type="radio" name="limpieza" id="l3" value="3"><label for="l3">3</label>
						<input type="radio" name="limpieza" id="l4" value="4"><label for="l4">4</label>
						<input type="radio" name="limpieza" id="l5" value="5"><label for="l5">5</label>
						<input type="radio" name="limpieza" id="l6" value="6"><label for="l6">6</label>
						<input type="radio" name="limpieza" id="l7" value="7"><label for="l7">7</label>
						<input type="radio" name="limpieza" id="l8" value="8"><label for="l8">8</label>
						<input type="radio" name="limpieza" id="l9" value="9"><label for="l9">9</label>
						<input type="radio" name="limpieza" id="l10" value="10"><label for="l10">10</label>
					</div>
					<br>
					<br>
					<label style="font-size: 20px;">Del 1 al 10 ¿Qué tan puntual fue tu doctor?</label><br>
					<div class="radio" style="font-size: 20px;">
						<input type="radio" name="puntualidad" id="pu1" value="1" required><label for="pu1">1</label>
						<input type="radio" name="puntualidad" id="pu2" value="2"><label for="pu2">2</label>
						<input type="radio" name="puntualidad" id="pu3" value="3"><label for="pu3">3</label>
						<input type="radio" name="puntualidad" id="pu4" value="4"><label for="pu4">4</label>
						<input type="radio" name="puntualidad" id="pu5" value="5"><label for="pu5">5</label>
						<input type="radio" name="puntualidad" id="pu6" value="6"><label for="pu6">6</label>
						<input type="radio" name="puntualidad" id="pu7" value="7"><label for="pu7">7</label>
						<input type="radio" name="puntualidad" id="pu8" value="8"><label for="pu8">8</label>
						<input type="radio" name="puntualidad" id="pu9" value="9"><label for="pu9">9</label>
						<input type="radio" name="puntualidad" id="pu10" value="10"><label for="pu10">10</label>
					</div>
					<br>
					<br>
					<label style="font-size: 20px;">Del 1 al 10 ¿Qué tan justo te pareció el precio de la consulta?</label><br>
					<div class="radio" style="font-size: 20px;">
						<input type="radio" name="precio" id="p1" value="1" required><label for="p1">1</label>
						<input type="radio" name="precio" id="p2" value="2"><label for="p2">2</label>
						<input type="radio" name="precio" id="p3" value="3"><label for="p3">3</label>
						<input type="radio" name="precio" id="p4" value="4"><label for="p4">4</label>
						<input type="radio" name="precio" id="p5" value="5"><label for="p5">5</label>
						<input type="radio" name="precio" id="p6" value="6"><label for="p6">6</label>
						<input type="radio" name="precio" id="p7" value="7"><label for="p7">7</label>
						<input type="radio" name="precio" id="p8" value="8"><label for="p8">8</label>
						<input type="radio" name="precio" id="p9" value="9"><label for="p9">9</label>
						<input type="radio" name="precio" id="p10" value="10"><label for="p10">10</label>
					</div>
					<br>
					<br>
					<label style="font-size: 20px;">Del 1 al 10 ¿Qué tan bien te trató el personal del consultorio?</label><br>
					<div class="radio" style="font-size: 20px;">
						<input type="radio" name="trato" id="t1" value="1" required><label for="t1"><b>1</b></label>
						<input type="radio" name="trato" id="t2" value="2"><label for="t2">2</label>
						<input type="radio" name="trato" id="t3" value="3"><label for="t3">3</label>
						<input type="radio" name="trato" id="t4" value="4"><label for="t4">4</label>
						<input type="radio" name="trato" id="t5" value="5"><label for="t5">5</label>
						<input type="radio" name="trato" id="t6" value="6"><label for="t6">6</label>
						<input type="radio" name="trato" id="t7" value="7"><label for="t7">7</label>
						<input type="radio" name="trato" id="t8" value="8"><label for="t8">8</label>
						<input type="radio" name="trato" id="t9" value="9"><label for="t9">9</label>
						<input type="radio" name="trato" id="t10" value="10"><label for="t10">10</label>
					</div>
					<br>
					<br>


					<div class="form-group">
	                    <textarea name="Comentarios" rows="5" class="form-control" placeholder="¿Deseas dejar algún comentario?" style="font-size: 20px; width: 90%;" id="Comentarios"></textarea>
	                </div>


	                <br>
	                <button class="btn btn-success">Enviar calificación</button>
				</form>
			@endforeach
		</div>
	</center>
</section>

@stop