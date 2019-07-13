<!DOCTYPE html>
<html>
<head>
	<title>Cita cancelada - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $usuario[0]->Nombre }} {{ $usuario[0]->Apellidos }}</p>
	 <p>¡Le damos un cordial saludo y agradecimiento por utilizar nuestra plataforma!</p>

    <p>Se le informa que su cita en el consultorio {{ $consultorio[0]->Nombre }} a las {{ $horario[0]->Hora_inicio }} por parte del doctor {{ $doctor[0]->Nombre }} {{ $doctor[0]->Apellidos }} ha sido cancelada por algún inconveniente <br>

    	Para conocer mayor información sobre el motivo de la cancelación le dejamos los datos del consultorio: <br>
    	<ul>
    		<li><strong>Consultorio: </strong>{{ $consultorio[0]->Nombre }}</li> <br>
    		<li><strong>Correo: </strong>{{ $consultorio[0]->Correo }}</li> <br>
    		<li><strong>Teléfono: </strong>{{ $consultorio[0]->Telefono }}</li> <br>
    		<li><strong>Correo del doctor: </strong>{{ $doctor[0]->Correo }}</li> <br>
    	</ul>
    </p>
    <p>Para cualquier duda mande un mensaje a este correo. Sin más, le deseamos un excelente día y lamentamos esta situación</p>
</body>
</html>