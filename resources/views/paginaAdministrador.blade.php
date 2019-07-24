@extends ('layouts.admin')
<?php
use Intervention\Image\Facades\Image;

    if(Request::session()->has('saludaunclick'))
    {
        Request::session()->forget('saludaunclick');
    }
    Request::session()->put('saludaunclick', 'http://localhost:8000/');


?>

@section ('librerias')
	<link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
@stop

@section ('contenido')
	<section class="FotoPrincipalAdministrador">
        <section class="FondoParallax" >
            <section class="parallax" style="background-image: url(img/nieve.jpg); height: 400px; margin-bottom: 0px;">
            </section>
        </section>
    </section>



    <section style="background: #E6E6E6;">
    	<div class="row align-items-center" style="padding-top: 50px; padding-bottom: 50px;">
            <button class="Boton col-md-2 offset-md-2  col-sm-12 col-sm-12" style="background: #333;"><p class="icon-users" style="font-size: 50px; color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Sugerencias</p></button>
            <button class="Boton col-md-2 offset-md-1 col-sm-12 col-sm-12" style="background: #333;"><p class="icon-users" style="font-size: 50px; color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Comentarios</p></button>
            <button class="Boton col-md-2 offset-md-1 col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalAnuncios" style="background: #333;"><p class="icon-camera" style="font-size: 50px; color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Anuncios</p></button>
        </div>
    </section>




    <div class="modal fade" role="dialog" id="ModalAnuncios">
	    	<div class="modal-dialog modal-lg">
	    		<div class="modal-content">
	    			<div class="modal-header">
	    				<h3>Anuncios</h3>
	    				<button type="button" class="close" data-dismiss="modal">&times;</button>
	    			</div>
	    			<div class="modal-anuncios-tabla" style="padding: 10px;">
	    				<center>
                        <table class="table table-striped" cellspacing="20px" >
                            <tr>
                                <th scope="col">Consultorios</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Opciones</th>
                            </tr>

                            @foreach($anuncios as $anuncio)
                            <tr>
                                <td>
                                    {{ $anuncio->Nombre }}
                                </td>
                                <td>
                                	<div class="tz-gallery">
	                                    <a class="lightbox" href="slide/{{ $anuncio->Imagen }}">
	                                    <img src="slide/{{ $anuncio->Imagen }}" alt="Park" class="card-img-top" height="250px" style="width: 500px;">
                                    </div>
                                    <p>
                                        Alto: {{ Image::make('slide/'.$anuncio->Imagen)->height() }} <br>
                                        Largo: {{ Image::make('slide/'.$anuncio->Imagen)->width() }}
                                    </p>
                                </td>
                                <td>
                                    <a href="noCumpleRequisitosAnuncio/{{ $anuncio->Registro }}/{{ $anuncio->Slide }}"><button class="btn btn-success" style="margin-bottom: 5px; margin-top: 5px; width: 100%;">No cumple requisitos</button></a><br>
                                    <a href="agregarAnuncio/{{ $anuncio->Registro }}/{{ $anuncio->Slide }}"><button class="btn btn-success" style="width: 100%;">Agregar</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </center>
	    			</div>
	    		</div>
	    	</div>
	    </div>
@stop

@section ('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>


    <script>
        baguetteBox.run('.tz-gallery');
    </script>
@stop