<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administrador";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Correo',
    	'Password'
    ];

    public $timestamps=false;
}
