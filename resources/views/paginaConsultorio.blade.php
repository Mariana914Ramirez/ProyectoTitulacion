@extends ('layouts.admin')

@section ('librerias')
	<link rel="stylesheet" type="text/css" href="css/estilos_consultorios.css">
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop

@section ('contenido')
	<section class="FotoPrincipalConsultorio">
        <section class="FondoParallax" >
            <section class="parallax" style="background-image: url(img/tranquilidad.jpg); height: 400px; margin-bottom: 0px;">
                <div align="center" style="margin-top: 25px;">
                    <p style="background: #333; width: 80%; color: #FFF; font-size: 35px;">Nombre del Consultorio</p>
                    <img src="img/consultorio.jpg" width="350px" height="250px" style="border: solid;">
                </div>
            </section>
        </section>
    </section>

    <center>
        <section class="informacionCons bg-info" style=" height: auto; padding: 20px;">
            <div class="card text-white  mb-3" style="max-width: 70%; margin-top: 30px; background: #333; align-content: center; padding: 20px;">
                  <div class="card-header" style="font-size: 25px;">Nombre del consultorio</div>
                  <div class="card-body" style="font-size: 20px;">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
            </div>
        </section>


        <section class="FondoParallax">
            <section class="parallax" style="background-image: url(img/rocas.jpeg); margin-bottom: 0px;">
                <div class="row align-items-center">
                    <button class="btn btn-info Botones col-md-2 offset-md-2  col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalCitas"><p class="icon-user-md" style="font-size: 50px;"></p><p style="font-weight: bolder;">Citas<p></button>
                    <button class="btn btn-info Botones col-md-2 offset-md-1 col-sm-12 col-sm-12"><p class="icon-users" style="font-size: 50px;"></p><p style="font-weight: bolder;">Comentarios<p></button>
                    <button class="btn btn-info Botones col-md-2 offset-md-1 col-sm-12 col-sm-12" data-toggle="modal" data-target="#ModalGaleria"><p class="icon-camera" style="font-size: 50px;"></p><p style="font-weight: bolder;">Galería<p></button>
                </div>

            </section>
        </section>
    </center>

    <div class="modal fade" role="dialog" id="ModalCitas">
        <div class="modal-dialog">
            <div class="modal-content" style="padding: 20px;">
                <div class="modal-header">
                    <h3>Doctores del consultorio</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-citas">
                    <p>
                        <p>Nombre: Sr Doctor Profesor Patricio</p>
                        <p>Edad: 25 años</p>
                        <p>Correo de contacto: ejemplo25patricio@gmail.com</p>
                        <p>Especialidades: <br>Especialidad 1 <br>Especialidad 2</p>
                    </p>
                </div>
                <button class="btn btn-success">Ver más</button>
            </div>
        </div>
    </div>



    <div class="modal fade" role="dialog" id="ModalGaleria">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-modales">
                    <div class="container">
 
                <div class="container gallery-container">
                  
                    <h1 class="text-center">Imágenes</h1>
                      
                    <div class="tz-gallery">
                  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/pluma.jpg">
                                    <img src="img/Ejemplo/pluma.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">    
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/cielo.jpg">
                                    <img src="img/Ejemplo/cielo.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                        </div> 
                             
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/estrellas.jpg">
                                    <img src="img/Ejemplo/estrellas.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                        </div>


                          <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/mar.jpg">
                                    <img src="img/Ejemplo/mar.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                          </div>

                        <div class="row">      
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/vista.jpg">
                                    <img src="img/Ejemplo/vista.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                        </div>
                             
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="card">
                                    <a class="lightbox" href="img/Ejemplo/rocas.jpg">
                                    <img src="img/Ejemplo/rocas.jpg" alt="Park" class="card-img-top" height="250px">
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                  
                    </div>
                  
                </div>
 
            </div>
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