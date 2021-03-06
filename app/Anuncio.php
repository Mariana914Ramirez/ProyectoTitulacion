<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = "slide";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Consultorio',
    	'Imagen',
    	'FechaFinal',
    	'Aceptado'
    ];

    public $timestamps=false;
}
