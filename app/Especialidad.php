<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'Especialidad';
    protected $primaryKey="Registro";

    public $timestamps=false;

    protected $fillable =[
    	'Nombre', 
    	'Revision'
    ];
}
