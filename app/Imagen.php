<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = "imagen";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Consultorio',
    	'Imagen'
    ];

    public $timestamps=false;
}
