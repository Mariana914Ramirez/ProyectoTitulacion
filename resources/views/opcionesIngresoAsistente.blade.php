@extends ('layouts.admin')
<?php

    if(Request::session()->has('saludaunclick'))
    {
        Request::session()->forget('saludaunclick');
    }
    Request::session()->put('saludaunclick', 'http://localhost:8000/');

?>

@section ('contenido')
<section id="content" class="Bienvenida">
	<center>
		<h1><b>Acceder como...</b></h1>


		<section class="FondoParallax">
            <section class="parallax" style="background-image: url(http://localhost:8000/img/fondo7.png);">
            	@foreach($correos as $correo)
                <div class="row align-items-center">
                    <button class="Botones col-md-3 offset-md-2  col-sm-12 col-sm-12 btn btn-success"><a href="{{ Session::get('saludaunclick') }}accedeAsistente/{{ $correo->Correo }}"><p class="icon-user-md" style="font-size: 50px; color:#FFF;"></p><p style="font-weight: bolder; color: #FFF;">Asistente</p></a></button>
                    <button class="Botones col-md-3 offset-md-2 col-sm-12 col-sm-12 btn btn-success"><a href="{{ Session::get('saludaunclick') }}accedeUsuario/{{ $correo->Correo }}"><p class="icon-user" style="font-size: 50px; color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Usuario</p></a></button>
                    
                </div>
                @endforeach
            </section>
        </section>
	</center>
</section>
@stop