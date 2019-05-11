<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $table = "estudios";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Especialidad',
    	'Doctor'
    ];

    public $timestamps=false;
}
