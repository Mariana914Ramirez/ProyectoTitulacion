<!DOCTYPE html>
<html>
<head>
	<title>Consultorio eliminado - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $consultorio[0]->Nombre }}</p>

    <p>Se le informa que su promedio general es menor a 3 y que se le dará de baja del sistema, lamentamos las malas noticias<br>

    	Estas son las citas pendientes <br>
    	<table>
            <thead>
                <th>Citas</th>
            </thead>
            <tbody>
                @if($relacionCitasConsultorio != null)
                    @foreach($relacionCitasConsultorio as $citas)
                        <tr>
                            <b>Doctor: </b>{{ $citas->DoctorNombre }} {{ $citas->Apellidos }}<br>
                            <b>Nombre del paciente: </b>{{ $citas->NombreUsuario }}<br>
                            <b>Teléfono: </b>{{ $citas->Telefono }}<br>
                            <b>Día de cita: </b>{{ $citas->Fecha }}<br>
                            <b>Horario: </b>{{ $citas->Hora_inicio }} - {{ $citas->Hora_termino }}<br>
                            <b>Tipo de cita: </b>{{ $citas->Concepto }}<br>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </p>
    <p>Para cualquier duda mande un mensaje a este correo.</p>
</body>
</html>