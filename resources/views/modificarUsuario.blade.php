@extends ('layouts.admin')
<?php 
        use Illuminate\Support\Carbon;
        use App\Doctor;

    if(Request::session()->has('saludaunclick'))
    {
        Request::session()->forget('saludaunclick');
    }
    Request::session()->put('saludaunclick', 'http://localhost:8000/');

?>


@section ('contenido')

    <section id="content" class="Bienvenida">
        <center>
            <h1>Información del Usuario</h1>
            <div style="width: 80%;" align="left">
                <form action="{{ Session::get('saludaunclick') }}guardar-cambios-usuario" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($usuarios as $usuario)
                        <label><b>Nombre:</b></label>
                        <input type="text" name="Nombre" placeholder="Nombre" class="form-control" required value="{{ $usuario->Nombre }}">
                        <br>
                        <label><b>Apellidos:</b></label>
                        <input type="text" name="Apellidos" placeholder="Apellidos" class="form-control" required value="{{ $usuario->Apellidos }}">
                        <br>
                        <label><b>Contraseña:</b></label>
                        <input type="password" name="Password" placeholder="Contraseña" class="form-control">
                        <br>
                        <label><b>Teléfono:</b></label>
                        <input type="text" name="Telefono" placeholder="Telefono" class="form-control" required value="{{ $usuario->Telefono }}">
                        <br>
                        <label><b>Correo de recuperación:</b></label>
                        <input type="text" name="CorreoRecuperacion" placeholder="Correo de recuperación" class="form-control" required value="{{ $usuario->CorreoRecuperacion }}">
                        <br>

                        <div class="form-group" align="center">
                            <label for="file-upload" class="btn btn-success">
                                <i class="fas fa-cloud-upload-alt icon-camera" style="font-size: 25px;"></i> Cambiar foto de perfil
                            </label>
                            <input id="file-upload" onchange='cambiarModificarUsuario()' type="file" style='display: none; font-size: 25px;' id="SubirFoto" name="SubirFoto" style="font-size: 25px;"/>
                            <div id="info-modificar-usuario" style="font-size: 25px;"></div>
                        </div>

                        <br>
                        <br>
                        
                    @endforeach
                    <br>
                    <div align="center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>

                <br>
                <br>
            </div>
        </center>
    </section>

    
@stop




@section ('script')
    <script type="text/javascript">
        function cambiarModificarUsuario(){
        var pdrs = document.getElementById('file-upload').files[0].name;
        document.getElementById('info-modificar-usuario').innerHTML = pdrs;
    }
    </script>
    
@stop