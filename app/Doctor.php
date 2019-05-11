<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = "doctores";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Correo',
    	'Nombre',
    	'Apellidos',
    	'Experiencia',
    	'Telefono',
    	'Sexo',
    	'Password',
    	'CorreoRecuperacion',
    	'FechaNacimiento',
    	'CorreoAsistente'
    ];

    public $timestamps=false;
}
