<!DOCTYPE html>
<html>
<head>
	<title>Estadísticas - Salud a un Click</title>
</head>
<body>
	<p>Hola {{ $oficinas[0]->Nombre }}</p>
     <p>¡Le damos un cordial saludo y agradecimiento por utilizar nuestra plataforma!</p>

    <p>Este correo tiene el propósito de informarle las estadísticas con las que contó el consultorio el mes de {{ $oficinas[0]->mes }}</p>

        Dicha información es la siguiente: <br>
        <ul>
            <li><strong>Cantidad de pacientes que visitaron el consultorio: </strong>{{ $estadisticas[0]->CantidadPersonas }}</li> <br>
            <li><strong>Promedio general: </strong>{{ $estadisticas[0]->promedio }}</li> <br>
            <li><strong>Calificación por puntualidad: </strong>{{ $estadisticas[0]->C_puntualidad }}</li> <br>
            <li><strong>Calificación por precio: </strong>{{ $estadisticas[0]->C_precio }}</li> <br>
            <li><strong>Calificación por limpieza: </strong>{{ $estadisticas[0]->C_limpieza }}</li> <br>
            <li><strong>Calificación por trato al paciente: </strong>{{ $estadisticas[0]->C_trato }}</li> <br>
        </ul>
        <?php
            $limpieza = 0;
            $puntualidad = 0;
            $trato = 0;
            $precio = 0;

            if($estadisticas[0]->C_limpieza < $estadisticas[0]->C_puntualidad){$limpieza = $limpieza + 1;}
            if($estadisticas[0]->C_limpieza < $estadisticas[0]->C_trato){$limpieza = $limpieza + 1;}
            if($estadisticas[0]->C_limpieza < $estadisticas[0]->C_precio){$limpieza = $limpieza + 1;}

            if($estadisticas[0]->C_puntualidad < $estadisticas[0]->C_limpieza){$puntualidad = $puntualidad + 1;}
            if($estadisticas[0]->C_puntualidad < $estadisticas[0]->C_trato){$puntualidad = $puntualidad + 1;}
            if($estadisticas[0]->C_puntualidad < $estadisticas[0]->C_precio){$puntualidad = $puntualidad + 1;}

            if($estadisticas[0]->C_trato < $estadisticas[0]->C_limpieza){$trato = $trato + 1;}
            if($estadisticas[0]->C_trato < $estadisticas[0]->C_puntualidad){$trato = $trato + 1;}
            if($estadisticas[0]->C_trato < $estadisticas[0]->C_precio){$trato = $trato + 1;}

            if($estadisticas[0]->C_precio < $estadisticas[0]->C_limpieza){$precio = $precio + 1;}
            if($estadisticas[0]->C_precio < $estadisticas[0]->C_puntualidad){$precio = $precio + 1;}
            if($estadisticas[0]->C_precio < $estadisticas[0]->C_trato){$precio = $precio + 1;}


        ?>
        @if($limpieza == 3)
            El aspecto que necesita mejorar es: Limpieza<br>
            Te recomendamos tener más cuidado en el aspecto del área de trabajo y mantener toda la basura en su lugar.
        @elseif($puntualidad == 3)
            El aspecto que necesita mejorar es: Puntualidad<br>
            Te recomendamos que los doctores del consultorio se encuentren preparados al menos 5 minutos antes de cada cita.
        @elseif($trato == 3)
            El aspecto que necesita mejorar es: Trato al paciente<br>
            Te recomendamos que los doctores tengan más paciencia y empatía con sus pacientes.
        @elseif($precio == 3)
            El aspecto que necesita mejorar es: Precio<br>
            Te recomendamos escuchar los comentarios de tus pacientes respecto al precio de las consultas.
        @endif
        <br>

        @if($comentarios != null)
            <table>
                <thead>
                    <th>Los 10 comentarios más recientes que tiene el consultorio son: </th>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                        <tr>
                            {{ $comentario->Comentario }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    <p>Para cualquier duda mande un mensaje a este correo. Sin más, le deseamos un excelente día.</p>
</body>
</html>