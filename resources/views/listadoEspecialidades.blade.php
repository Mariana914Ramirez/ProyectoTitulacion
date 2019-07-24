@extends ('layouts.admin')
@extends ('Formularios')
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
			<table class="table table-hover table-striped" style="width: 100%; background: #EEE;">
				<thead style="font-size: 40px; text-align: center;">
					<th>Especialidades</th>
				</thead>
				<tbody style="font-size: 30px; text-align: center;">
					@foreach($especialidades as $especialidad)
						<tr>
							<td><a href="especialidad/{{ $especialidad->Registro }}" style="color: #000;">{{ $especialidad->Nombre }}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div style="text-align:center;">
				<div style="display:inline-block; margin:0 auto;">
					{!!$especialidades->render()!!}
				</div>
			</div>
		</div>
	</center>
</section>
@stop