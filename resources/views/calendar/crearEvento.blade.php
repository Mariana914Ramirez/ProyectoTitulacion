@extends('layouts.admin')

@section('contenido')
<div class="Bienvenida">
	<center>
		<legend>
            <b>Crear un evento</b>
        </legend>
		<section style="width: 80%; text-align: left;">
		    <form action="http://127.0.0.1:8000/cal" method="POST" role="form">
		        @csrf
		        <div class="form-group">
		            <label for="title">
		                <b>Título</b>
		            </label>
		            <input class="form-control" name="title" placeholder="Título" type="text">
		        </div>
		        <div class="form-group">
		            <label for="description">
		                <b>Descripción</b>
		            </label>
		            <input class="form-control" name="description" placeholder="Descripción" type="text">
		        </div>
		        <div class="form-group">
		            <label for="start_date">
		                <b>Fecha de inicio</b>
		            </label>
		            <input class="form-control" name="start_date" placeholder="Fecha de inicio" type="text">
		        </div>
		        <div class="form-group">
		            <label for="end_date">
		                <b>Fecha de término</b>
		            </label>
		            <input class="form-control" name="end_date" placeholder="Fecha de término" type="text">
		        </div>
		        <button class="btn btn-success" type="submit">
		            Crear
		        </button>
		    </form>
    	</section>
    </center>
</div>
@endsection
https://docs.microsoft.com/en-us/outlook/rest/php-tutorial