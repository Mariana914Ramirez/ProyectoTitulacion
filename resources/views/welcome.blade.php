@extends ('layouts.admin')

@section ('librerias')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@stop

@section ('contenido')
    <section class="contenedor">
        <div class="col-md-12 container" >
            <div id="banner" class="carousel slide" data-ride="carousel">
              

              <center>
                @if($errors->any())
                    <div class="alert alert-danger" style="width: 80%; padding-bottom: 0px; margin-bottom: 0px;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="display: unset; font-size: 25px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif




              <div class="carousel-inner imagenes" role="listbox">
                
                <div class="carousel-item active" data-interval="10000">
                  <img class="d-block w-100" src="img/Anuncios/Anuncio1.png" alt="Anuncio1">
                </div>

                <div class="carousel-item" data-interval="10000">
                  <img class="d-block w-100" src="img/Anuncios/Anuncio2.png" alt="Anuncio2">
                </div>

                @foreach($anuncios as $anuncio)
                <div class="carousel-item" data-interval="10000">
                    <img class="d-block w-100" src="/slide/{{ $anuncio->Imagen }}" alt="{{ $anuncio->Imagen }}">
                </div>
                @endforeach
              </div>
            
              </center>

              <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        
    </section>



    <section class="Bienvenida">
        <center>
          @if ((Session::exists('consultorioSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession'))||(Session::exists('doctorSession'))) 
            @foreach($nombres as $nombre)
              <h1>Te damos la Bienvenida {{ $nombre->Nombre }}</h1>
            @endforeach
          @elseif((Session::exists('administradorSession')))
            <h1>Te damos la Bienvenida Administrador {{(Session::get('administradorSession'))[0]->Correo}}</h1>
          @endif
            <p class="TextoDelBanner">¿Tienes un consultorio? Regístralo <a href="formulario"><button class="btn btn-success">Aquí</button></a></p>

            <section class="FondoParallax">
                <section class="parallax" style="background-image: url(img/ciudad.jpeg);">
                    <div class="row align-items-center">
                        <button class="btn btn-success Botones col-md-2 offset-md-2  col-sm-12 col-sm-12" ><a href="consultorios"><p class="icon-user-md" style="font-size: 50px;color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Consultorios</p></a></button>
                        <button class="btn btn-success Botones col-md-2 offset-md-1 col-sm-12 col-sm-12" ><a href="especialidades"><p class="icon-stethoscope" style="font-size: 50px;color: #FFF;"></p><p style="font-weight: bolder;color: #FFF;">Especialidades</p></a></button>
                        <button class="btn btn-success Botones col-md-2 offset-md-1 col-sm-12 col-sm-12" ><a href="#FinalPagina"><p class="icon-phone" style="font-size: 50px;color: #FFF;"></p><p style="font-weight: bolder; color: #FFF;">Contacto</p></a></button>
                    </div>

                </section>
            </section>

            <section style="background-image: url(http://127.0.0.1:8000/img/fondo6.png); padding: 40px 40px 20px 20px; width: 85%; height: auto; margin-bottom: 40px;">
              <div style="color: #FFF; width: 80%; background: #222; opacity: 0.75; padding: 20px 20px 20px 20px;">
                <p style="font-size: 25px;">!Bienvenido a Salud a un Click</p>
                <p style="font-size: 20px;">Esta página ha sido creada con el propósito de ayudarle a encontrar un consultorio que logre adecuarse a sus necesidades. <br> Después de cada consulta que usted programe, podrá calificar cada uno de los aspectos del consultorio (Limpieza, Puntualidad, Trato al cliente y Precio) Para así ayudar a otros pacientes a conocer de antemano el servicio que ofrece el consultorio. <br> Si usted tiene un consultorio puede registrarlo en la página para que más personas puedan conocerlo y su negocio pueda crecer más rápido.<br></p>
                <p style="font-size: 23px;">¡Nosotros nos preocupamos por usted! <br><br></p>
              </div>
            </section>


            <section id="Comentarios">
              <table class="table table-dark" style="width: 100%;">
                <thead style="font-size: 30px;">
                    <th colspan="3" style="padding-left: 20px;">Comentarios</th>
                </thead>
                @if (((Session::exists('doctorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession')))) 
                <tr>
                  <form action="/" method="post">
                    @csrf
                    <td style="text-align: center;">
                      <p class="icon-heartbeat" style="width: 150px; height: 150px; font-size: 8vw;"></p>
                    </td>
                    <td style="width: 70%;">
                      <textarea name="Comentarios" rows="4" placeholder="Deja un comentario" style="font-size: 20px;" id="Comentarios" class="form-control" required></textarea>
                    </td>
                    <td style="width: 13%; align-content: center;">
                      <button type="submit" class="btn btn-success" >Comentar</button>
                    </td>
                  </form>
                </tr>
                @endif
                @foreach($mandados as $mandar)
                <tr>
                  <td style="width: 17%;">
                    <img src="/avatar/{{ $mandar->Imagen }}" style="width: 150px; height: 150px;">
                  </td>
                  <td colspan="2">
                    <p><b style="font-size: 20px;">{{$mandar->Nombre}} {{$mandar->Apellidos}}</b></p>
                    <p>{{$mandar->Comentario}}</p>


                      @if (Session::exists('doctorSession'))
                        @if (((Session::get('doctorSession'))[0]->Correo) == $mandar->Correo)
                          <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                        @else
                          <br>
                        @endif
                      @elseif (Session::exists('usuarioSession'))
                        @if (((Session::get('usuarioSession'))[0]->Correo) == $mandar->Correo)
                          <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                        @else
                          <br>
                        @endif
                      @elseif (Session::exists('asistenteSession'))
                        @if (((Session::get('asistenteSession'))[0]->CorreoAsistente) == $mandar->Correo)
                          <p style="text-align: right; margin-right: 40px;"><a href="" style="color: #36ABFF;">Modificar</a> / <a href="" style="color: #FF5B5B;">Eliminar</a></p>
                        @else
                          <br>
                        @endif
                      @else
                        <br>
                      @endif

                    <i style="font-size: 13px;">Publicado: {{$mandar->Hora}}</i>
                  </td>
                </tr>
                @endforeach
              </table>

              <div style="text-align:center;">
                <div style="display:inline-block; margin:0 auto;">
                  {!!$mandados->render()!!}
                </div>
              </div>
            </section>


            @if (((Session::exists('doctorSession'))||(Session::exists('usuarioSession'))||(Session::exists('asistenteSession')))) 
            <table class="table table-dark" style="width: 80%;">
                <thead style="font-size: 30px;">
                    <th colspan="3" style="padding-left: 20px;">Sugerencias</th>
                </thead>
                
                <tr>
                  <form action="sugerencias" method="post">
                    @csrf
                    <td style="text-align: center;">
                      <p class="icon-heartbeat" style="font-size: 3vw;"></p>
                    </td>
                    <td style="width: 70%;">
                      <textarea name="Comentarios" rows="1" placeholder="¿No encontraste la especialidad que buscabas? Escríbela aquí" style="font-size: 20px;" id="Comentarios" class="form-control" required></textarea>
                    </td>
                    <td style="width: 13%; align-content: center;">
                      <button type="submit" class="btn btn-success" >Enviar</button>
                    </td>
                  </form>
                </tr>
              </table>
              @endif
            

        </center>
    </section>
    
@stop




@section ('modal')

    

@stop




