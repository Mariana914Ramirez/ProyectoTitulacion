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
    	'CorreoRecuperacion',
    	'Imagen',
    	'Revisado',
        'mes',
        'CantidadPersonas'
    ];

    public $timestamps=false;
}
