@extends ('layouts.admin')
@extends ('Formularios')

@section ('contenido')
<section id="content" class="Bienvenida">
	<center>
		<div style="width: 80%;">
			<table class="table table-hover table-striped" style="width: 100%;">
				<thead style="font-size: 40px; text-align: center;">
					<th>Especialidades</th>
				</thead>
				<tbody style="font-size: 30px; text-align: center;">
					@foreach($especialidades as $especialidad)
						<tr>
							<td><a href="especialidad/{{ $especialidad->Registro }}">{{ $especialidad->Nombre }}</a></td>
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