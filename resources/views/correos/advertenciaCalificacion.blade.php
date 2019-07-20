<!DOCTYPE html>
<html>
<head>
	<title>Advertencia - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $consultorio[0]->Nombre }}</p>
	 <p>¡Le damos un cordial saludo y agradecimiento por utilizar nuestra plataforma!</p>

    <p>Se le informa que su promedio general es muy bajo y debe aumentar. Si su calificación llega a ser menor de 3, se le dará de baja en el sistema.<br>

    	Estas son las calificaciones actuales de cada uno de los aspectos a evaluar: <br>
    	<ul>
    		<li><strong>Puntualidad: </strong>{{ $consultorio[0]->C_puntualidad }}</li> <br>
    		<li><strong>Precio: </strong>{{ $consultorio[0]->C_precio }}</li> <br>
    		<li><strong>Limpieza: </strong>{{ $consultorio[0]->C_limpieza }}</li> <br>
    		<li><strong>Trato al cliente: </strong>{{ $consultorio[0]->C_trato }}</li> <br>
    	</ul>
    </p>
    <p>Para cualquier duda mande un mensaje a este correo. Sin más, le deseamos un excelente día.</p>
</body>
</html>