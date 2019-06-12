@extends ('layouts.admin')

@section ('contenido')
<section id="content" class="Bienvenida">
	<center>
		<h1><b>Acceder como...</b></h1>


		<section class="FondoParallax">
            <section class="parallax" style="background-image: url(http://127.0.0.1:8000/img/fondo7.png);">
            	@foreach($correos as $correo)
                <div class="row align-items-center">
                    <button class="Botones col-md-3 offset-md-2  col-sm-12 col-sm-12 btn btn-success"><a href="http://127.0.0.1:8000/accedeDoctor/{{ $correo->Correo }}"><p class="icon-user-md" style="font-size: 50px; color:#000;"></p><p style="font-weight: bolder; color: #000;">Doctor</p></a></button>
                    <button class="Botones col-md-3 offset-md-2 col-sm-12 col-sm-12 btn btn-success"><a href="http://127.0.0.1:8000/accedeUsuario/{{ $correo->Correo }}"><p class="icon-user" style="font-size: 50px; color: #000;"></p><p style="font-weight: bolder; color: #000;">Usuario</p></a></button>
                    
                </div>
                @endforeach
            </section>
        </section>
	</center>
</section>
@stop