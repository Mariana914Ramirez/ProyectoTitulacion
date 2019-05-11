<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $table = "consultorios";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Correo',
    	'Estado',
    	'Municipio',
    	'Nombre',
    	'Telefono',
    	'Password',
        'Ubicacion',
        'Descripcion',
    	'Puntos',
    	'C_precio',
    	'C_limpieza',
    	'C_puntualidad',
    	'C_trato',
    	'Mes_uno',
    	'Mes_dos',
    	'Mes_tres',
    	'Mes_cuatro',
    	'Mes_cinco',
    	'Mes_seis',
    	'CorreoRecuperacion',
    	'Imagen',
    	'Revisado'
    ];

    public $timestamps=false;
}
