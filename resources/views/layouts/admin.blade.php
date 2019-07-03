
<!DOCTYPE html>
<html>
<head>
    <title>Salud a un click</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/css/fontello.css">


    @yield('librerias')

</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
          <a class="navbar-brand" href="/"><h1 class="icon-heartbeat">Salud a un click</h1></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


              <li class="nav-item">
                <a class="nav-link" href="/" aria-haspopup="true" aria-expanded="false"><b class="icon-home">Inicio </b></a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/consultorios"><b class="icon-user-md">Consultorios </b><span class="sr-only">(current)</span></a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/especialidades"><b class="icon-stethoscope">Especialidades </b><span class="sr-only">(current)</span></a>
              </li>

               @if ((Session::exists('consultorioSession'))||(Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-users">Notificaciones</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
               @else
              <li class="nav-item">
                <a class="nav-link" href="#FinalPagina"><b class="icon-phone">Contacto </b><span class="sr-only">(current)</span></a>
              </li>
              @endif


              @if (Session::exists('administradorSession'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="administrador" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-cog-alt">Mi cuenta</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://127.0.0.1:8000/administrador">Ir a mi cuenta</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#administradorRegistroModal">Agregar administrador</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Eliminar cuenta</a>
                  </div>
                </li>
                @elseif (Session::exists('consultorioSession'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-cog-alt">Mi cuenta</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://127.0.0.1:8000/cuentaConsultorio">Ir a mi cuenta</a>
                    <a class="dropdown-item" href="#">Modificar información</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#mandarAnuncioModal">Mandar anuncio</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Eliminar cuenta</a>
                  </div>
                </li>
                @elseif ((Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-cog-alt">Mi cuenta</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://127.0.0.1:8000/doctor">Ir a mi cuenta</a>
                    <a class="dropdown-item" href="#">Modificar información</a>
                    <a class="dropdown-item" href="http://127.0.0.1:8000/modificarHorarios">Modificar horarios</a>
                    <a class="dropdown-item" href="#">Agenda</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#preciosModal">Modificar precios</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Eliminar cuenta</a>
                  </div>
                </li>
                @elseif (Session::exists('usuarioSession'))
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://127.0.0.1:8000/administrador" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-cog-alt">Mi cuenta</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="http://127.0.0.1:8000/modificarUsuario">Modificar información</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Eliminar cuenta</a>
                  </div>
                </li>
              @endif
                

              @if ((Session::exists('consultorioSession'))||(Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                  <li class="nav-item">
                    <a class="nav-link" href="http://127.0.0.1:8000/salir"><b class="icon-user">Cerrar Sesión </b><span class="sr-only">(current)</span></a>
                </li>              
              @else
                <li class="nav-item">
                  <a class="nav-link" href="#"><b class="icon-user" data-toggle="modal" data-target="#loginModal">Iniciar Sesión </b><span class="sr-only">(current)</span></a>
                </li>
              @endif


            </ul>
            <form class="form-inline my-2 my-lg-0" action="http://127.0.0.1:8000/buscar" method="get">
              @csrf
              <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscador">
              <button class="icon-search btn btn-outline-primary my-2 my-sm-0" type="submit"></button>
            </form>
          </div>
        </nav>
    </header>




      <main>
        @yield('contenido')
      </main>




    
        
    <a name="FinalPagina"></a>
    <footer class="footer text-lg-justify">
            <div class="row">
                <a  href="/" class="col-md-4 col-sm-12" style="text-align: center;"><p class="icon-heartbeat" style="font-size: 70px; color: #FFF;"></p></a>
                <div class="col-md-4 col-sm-12" style="font-size: 20px; font-weight: bolder; margin-top: 30px; color: #FFF;">
                    <p style="font-size: 25px;">Contáctanos</p>
                    <p>mariana914ram@gmail.com</p>
                </div>
                <div class="col-md-4 col-sm-12" style="font-size: 20px; font-weight: bolder; color: #FFF;">
                    <ul>
                        <li><a  href="#" style="color: #FFF;">Nosotros</a></li>
                        <li><a  href="#" style="color: #FFF;">Especialidades</a></li>
                        <li><a  href="#" style="color: #FFF;">Consultorios</a></li>
                        <li><a  href="#" style="color: #FFF;">Configuraciones</a></li>
                    </ul>
                </div>
            </div>
    </footer>

    <!--Modals*********************************************************-->

    <div class="modal fade" role="dialog" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Login</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="http://127.0.0.1:8000/usuario/login" method="post" >
                   @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="Correo" class="form-control" placeholder="Correo" id="Correo">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" class="form-control" placeholder="Contraseña" id="Password">
                        </div>

                    </div>
                    <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                        <button type="submit" class="btn btn-success">Ingresar</button>
                    </div>
                  </form>
                
                <div class="Otro-modal">

                    <p style="text-align: center;">¿No tienes cuenta? Regístrate <a href="#" data-toggle="modal" data-target="#RegistroModal" data-dismiss="modal">Aquí</a></p>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" role="dialog" id="RegistroModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Registro</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <form action="http://127.0.0.1:8000/usuario" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">


                      <div class="form-group">
                          <input type="email" name="Correo" class="form-control " placeholder="Correo" id="Correo" required>
                      </div>
                      <div class="form-group">
                          <input type="password" name="Password" class="form-control" placeholder="Contraseña" id="Password" required pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,20}$" title="Al menos una mayúscula, una minúscula y un número. Mínimo 8 caracteres y máximo 20">
                      </div>
                      <!--<div class="form-group">
                          <input type="password" name="passwordRepetir" class="form-control" placeholder="Repetir contraseña">
                      </div>-->
                      <div class="form-group">
                          <input type="text" name="Nombre" placeholder="Nombre" class="form-control" id="Nombre" required>
                      </div>
                      <div class="form-group">
                          <input type="text" name="Apellidos" placeholder="Apellido" class="form-control" id="Apellidos" required>
                      </div>
                      <div class="form-group">
                          <input type="email" name="CorreoRecuperacion" placeholder="Correo de Recuperación" class="form-control" id="CorreoRecuperacion" required>
                      </div>
                      <div class="form-group">
                          <input type="tel" name="Telefono" placeholder="Teléfono" class="form-control" id="Telefono" required pattern="[0-9]{10,10}" title="Se necesitan 10 dígitos">
                      </div>
                      <div class="form-group" align="center">
                          <p>Sexo:&nbsp;&nbsp;
                          <input type="radio" name="Sexo" value="m" id="Sexo" required>Masculino&nbsp;&nbsp;
                          <input type="radio" name="Sexo" value="f" id="Sexo" required>Femenino</p></p>
                      </div>

                      <div class="form-group" align="center">
                          <label for="file-upload" class="btn btn-success">
                              <i class="fas fa-cloud-upload-alt icon-camera"></i> Foto (Opcional)
                          </label>
                          <input id="file-upload" onchange='cambiar()' type="file" style='display: none; font-size: 25px;' id="SubirFoto" name="SubirFoto"/>
                          <b id="info"></b>
                      </div>

                      <div class="form-group" style="text-align: center;">
                          <div class='input-group date' id='datepicker' style="display:inline-block; margin:0 auto;">
                              <input type='text' placeholder="Fecha de nacimiento" style="text-align: center; align-content: center;" id="FechaNacimiento" name="FechaNacimiento" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>

                  </div>
                  <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                      <button type="submit" class="btn btn-success">Registrar</button>
                  </div>
              </form>
                
            </div>
        </div>
    </div>


    <div class="modal fade" role="dialog" id="administradorRegistroModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Registro de aministrador</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="http://127.0.0.1:8000/administrador" method="post" >
                   @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="Correo" class="form-control" placeholder="Correo" id="Correo">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" class="form-control" placeholder="Contraseña" id="Password">
                        </div>

                    </div>
                    <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                  </form>
                
            </div>
        </div>
    </div>





    <div class="modal fade" role="dialog" id="mandarAnuncioModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Mandar anuncio</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                   <div style="margin-bottom: 40px; margin-top: 40px;">
                    <p style="margin-left: 10%; margin-right: 10%;">
                      Para mandar un anuncio se deben cumplir con 2 requisitos. <br>
                      <b>1.</b> La imagen debe medir 1000px de largo y 500px de alto.<br>
                      <b>2.</b> No debe tener faltas ortográficas.<br><br>
                      Se le dará prioridad a los consultorios que tengan mayor calificación, ya que la sección de anuncios sólo soportará 10 anuncios.<br>
                      En caso de que los requisitos no se cumplan o que no haya espacio en el slide se le intentará mandar un mensaje a la brevedad explicando el motivo.<br><br>
                    </p>

                    <p style="margin-left: 10%; margin-right: 10%;">Ingrese la fecha en la que le interesaría empezar a mostrar su anuncio</p>
                    <form action="http://127.0.0.1:8000/anuncios" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group" style="text-align: center;">
                          <div class='input-group date' id='datepickes' style="display:inline-block; margin:0 auto;">
                              <input type='text' placeholder="Fecha de inicio" style="text-align: center; align-content: center;" id="FechaInicio" name="FechaInicio" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>

                      <div class="form-group" style="text-align: center;">
                          <div class='input-group date' id='datepicks' style="display:inline-block; margin:0 auto;">
                              <input type='text' placeholder="Fecha de término" style="text-align: center; align-content: center;" id="FechaTermino" name="FechaTermino" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>



                        <div class="form-group" align="center">
                            <label for="file-uploadT" class="btn btn-primary">
                                <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 20px;"></i> Subir foto de anuncio
                            </label>
                            <input id="file-uploadT" onchange='cambiarT()' type="file" style='display: none; font-size: 20px;' id="SubirAnuncio" name="SubirAnuncio" style="font-size: 20px;" required/>
                            <div id="infoT" style="font-size: 20px;"></div>
                        </div>
                        <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                            <button type="submit" class="btn btn-success" style="width: 70%;">Enviar</button>
                        </div>
                      </form>
                    </div>
            </div>
        </div>
    </div>



    <div class="modal fade" role="dialog" id="preciosModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Conceptos de citas</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                   <div style="margin-bottom: 40px; margin-top: 40px; align-content: center;">
                    <p style="margin-left: 10%; margin-right: 10%;">
                      Aquí puede agregar los conceptos que te gustaría darles un precio
                    </p>

                    <form action="http://127.0.0.1:8000/precios" method="post" enctype="multipart/form-data">
                        @csrf
                        <center>
                        <table class="table table-dark" style="width: 90%;" id="dynamic_field_precios">
                            <thead>
                                <th style="width: 70%;">Concepto</th>
                                <th style="width: 20%;">Precio</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <div>
                                        <td>
                                            <select name="Concepto[]" onchange='checkvalue(this.value, 0)' class="form-control" id="Concepto[]">
                                                <option>Concepto</option>
                                                <option>Consulta general</option>
                                                <option>Estudios</option>
                                                <option>Otro</option>
                                            </select>
                                            <input type="text" name="Hola[]" placeholder="Concepto" style="display: none;" id="Hola[0]" class="form-control">
                                        </td>
                                        
                                        <td><input type="text" name="Precio[]" placeholder="Precio" class="form-control" required pattern="[0-9]*" title="Sólo se aceptan números" id="Precio[]"></td>
                                        <td><button type="button" class="btn btn-success form-control" name="addAgregar" id="addAgregar">+</button></td>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-final" style="text-align: center; margin-bottom: 10px;">
                            <button type="submit" class="btn btn-success" style="width: 70%;">Enviar</button>
                        </div>
                        </center>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>



        @yield('modal')


    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/dropdown.js"></script>
    <script type="text/javascript">
        function cambiar(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info').innerHTML = pdrs;
    }
    </script>

    <script type="text/javascript">
        function cambiarT(){
        var pdrs = document.getElementById('file-uploadT').files[0].name;
        document.getElementById('infoT').innerHTML = pdrs;
    }
    </script>


    <script type="text/javascript" src="js/calendario.js"></script>
    <script >
        $(function () {
            $('#datepicker').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });

            $('#datepickes').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });

            $('#datepicks').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });
        });
    </script>




    <script>
        function checkvalue(val, i)
        {
            if(val==="Otro")
               document.getElementById('Hola['+i+']').style.display='block';
            else
               document.getElementById('Hola['+i+']').style.display='none'; 
        }
    </script>




    <script>  
     $(document).ready(function(){  


            var i=1; 
            var j=1;
         $('#addAgregar').click(function(){  
               $('#dynamic_field_precios').append('<tr id="row'+i+'"><div><td><select name="Concepto[]" id="Concepto['+i+']" onchange="checkvalue(this.value, '+i+')" class="form-control"><option>Concepto</option> <option>Consulta general</option><option>Estudios</option><option>Otro</option></select><input type="text" name="Hola[]" placeholder="Concepto" style="display: none;" id="Hola['+i+']" class="form-control"> </td> <td><input type="text" name="Precio[]" placeholder="Precio" id="Precio['+i+']" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove form-control">X</button></td></div></tr>');  
               i++;
          });  

            $(document).on('click', '.btn_remove', function(){  
               var button_id = $(this).attr("id");   
               $('#row'+button_id+'').remove();  
            });  
        });  
    </script>

    
        @yield('script')

</body>
</html>