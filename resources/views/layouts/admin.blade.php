
<!DOCTYPE html>
<html>
<head>
    <title>Salud a un click</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">


    @yield('librerias')

</head>
<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">
          <a class="navbar-brand" href="index.html"><h1 class="icon-heartbeat">Salud a un click</h1></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">


              <li class="nav-item">
                <a class="nav-link" href="/" aria-haspopup="true" aria-expanded="false"><b class="icon-home">Inicio </b></a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="consultorios"><b class="icon-user-md">Consultorios </b><span class="sr-only">(current)</span></a>
              </li>


              <li class="nav-item">
                <a class="nav-link" href="especialidades"><b class="icon-stethoscope">Especialidades </b><span class="sr-only">(current)</span></a>
              </li>

               @if ((Session::exists('consultorioSession'))||(Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-users">Notificaciones</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <table class="table table-dark">
                      <tr>
                        <td>Hola</td>
                        <td>Cómo estás</td>
                      </tr>
                    </table>
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


              @if ((Session::exists('consultorioSession'))||(Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b class="icon-cog-alt">Configuraciones</b>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
              @endif

              @if ((Session::exists('consultorioSession'))||(Session::exists('administradorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
                  <li class="nav-item">
                    <a class="nav-link" href="salir"><b class="icon-user">Cerrar Sesión </b><span class="sr-only">(current)</span></a>
                </li>              
              @else
                <li class="nav-item">
                  <a class="nav-link" href="#"><b class="icon-user" data-toggle="modal" data-target="#loginModal">Iniciar Sesión </b><span class="sr-only">(current)</span></a>
                </li>
              @endif


            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="icon-search btn btn-outline-primary my-2 my-sm-0" type="submit"></button>
            </form>
          </div>
        </nav>
    </header>




      <main>
        @yield('contenido')
      </main>




    
        
    <a name="FinalPagina"></a>
    <footer class="footer text-lg-justify py-2">
        <div class="container" >
            <div class="row">
                <div class="col-md-4 icon-heartbeat" style="font-size: 70px; color: #FFF;"><a  href="#"></a></div>
                <div class="col-md-4" style="font-size: 20px; font-weight: bolder; margin-top: 30px; color: #FFF;">
                    <p style="font-size: 25px;">Contáctanos</p>
                    <p>mariana914ram@gmail.com</p>
                </div>
                <div class="col-md-4" style="font-size: 20px; font-weight: bolder; color: #FFF;">
                    <ul>
                        <li><a  href="#" style="color: #FFF;">Nosotros</a></li>
                        <li><a  href="#" style="color: #FFF;">Especialidades</a></li>
                        <li><a  href="#" style="color: #FFF;">Consultorios</a></li>
                        <li><a  href="#" style="color: #FFF;">Configuraciones</a></li>
                    </ul>
                </div>
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

                <form action="usuario/login" method="post" >
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
            <!--<button class="btn btn-primary" data-toggle="modal" data-target="#RegistroModal" data-dismiss="modal">Aquí</button>-->
        </div>
    </div>


    <div class="modal fade" role="dialog" id="RegistroModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Registro</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                @yield('registro')
                
            </div>
        </div>
    </div>



        @yield('modal')


    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    
        @yield('script')

</body>
</html>