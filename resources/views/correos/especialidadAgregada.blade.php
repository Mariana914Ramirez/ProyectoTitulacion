<!DOCTYPE html>
<html>
<head>
	<title>¡Una especialidad ha sido agregada! - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $usuario[0]->Nombre }} {{ $usuario[0]->Apellidos }}</p>
	 <p>¡Le damos un cordial saludo y agradecimiento por utilizar nuestra plataforma!</p>

    <p>Se le informa que finalmente la especialidad de {{ $especialidad[0]->Nombre }} ha sido agregada en nuestra plataforma <br>
    	Le invitamos a conocer a los consultorios que la tienen entrando a nuestra página.
    </p>
    <p>Para cualquier duda mande un mensaje a este correo. Sin más, le deseamos un excelente día</p>
</body>
</html>