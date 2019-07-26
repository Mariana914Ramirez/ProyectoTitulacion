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
			<form action="{{ Session::get('saludaunclick') }}guardar-comentario-editado-principal/{{ $comentario[0]->Registro }}/{{ $comentario[0]->Consultorio }}" class="formulario" method="post">
				@csrf
				<h2>Editar Comentario</h2>
				<br>
				<br>

                <textarea name="Comentarios" rows="5" class="form-control" placeholder="¿Deseas dejar algún comentario?" style="font-size: 20px; width: 90%;" id="Comentarios" required>{{ $comentario[0]->Comentario }}</textarea>


                <br>
                <button class="btn btn-success">Editar</button>
			</form>
		</div>
	</center>
</section>

@stop