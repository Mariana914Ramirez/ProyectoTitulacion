<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificaciones";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Consultorio',
        'promedio',
    	'C_limpieza',
    	'C_puntualidad',
    	'C_trato',
    	'C_precio',
    	'mes',
        'CantidadPersonas',
        'num_mes'
    ];

    public $timestamps=false;
}
