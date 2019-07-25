<!DOCTYPE html>
<html>
<head>
	<title>Citas del doctor - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $consultorio[0]->Nombre }}</p>

    <p>Se detectó que acaba de eliminar al doctor {{ relacionCitasConsultorios[0]->DoctorNombre }} {{ relacionCitasConsultorios[0]->Apellidos }}, el cual tenía tenía pendiente las siguientes citas:<br>
    	<table>
            <thead>
                <th>Citas</th>
            </thead>
            <tbody>
                    @foreach($relacionCitasConsultorio as $citas)
                        <tr>
                            <b>Nombre del paciente: </b>{{ $citas->NombreUsuario }}<br>
                            <b>Teléfono: </b>{{ $citas->Telefono }}<br>
                            <b>Día de cita: </b>{{ $citas->Fecha }}<br>
                            <b>Horario: </b>{{ $citas->Hora_inicio }} - {{ $citas->Hora_termino }}<br>
                            <b>Tipo de cita: </b>{{ $citas->Concepto }}<br>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </p>
    <p>Para cualquier duda o aclaración mande un mensaje a este correo. Le deseamos un excelente día</p>
</body>
</html>