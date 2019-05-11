
@section ('registro')


<form action="usuario" method="post" id="HolaFormulario">
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

@stop