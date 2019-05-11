<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = "usuarios";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Correo',
    	'Nombre',
    	'Apellidos',
    	'Telefono',
    	'Sexo',
    	'Password',
    	'CorreoRecuperacion',
    	'FechaNacimiento'
    ];

    public $timestamps=false;
}
