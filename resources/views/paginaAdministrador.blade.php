@extends ('layouts.admin')

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

                            <tr>
                                <td>
                                    Consultorio 1
                                </td>
                                <td>
                                	<div class="tz-gallery">
	                                    <a class="lightbox" href="img/nieve.jpg">
	                                    <img src="img/nieve.jpg" alt="Park" class="card-img-top" height="250px">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success">No hay espacio</button><br>
                                    <button class="btn btn-success" style="margin-bottom: 5px; margin-top: 5px;">No cumple requisitos</button><br>
                                    <button class="btn btn-success">Agregar</button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Consultorio 2
                                </td>
                                <td>
                                    <div class="tz-gallery">
	                                    <a class="lightbox" href="img/Ejemplo/cielo.jpg">
	                                    <img src="img/Ejemplo/cielo.jpg" alt="Park" class="card-img-top" height="250px">
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success">No hay espacio</button><br>
                                    <button class="btn btn-success" style="margin-bottom: 5px; margin-top: 5px;">No cumple requisitos</button><br>
                                    <button class="btn btn-success">Agregar</button>
                                </td>
                            </tr>
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