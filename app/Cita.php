<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = "citas";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'DoctorConsultorio',
    	'Usuario',
    	'Horarios',
    	'Fecha',
    	'Nombre',
        'Telefono',
        'Concepto',
        'Asistir',
    ];

    public $timestamps=false;
}
