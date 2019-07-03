<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $table = "precios";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Descripcion',
    	'Precio',
    	'DoctorConsultorio'
    ];

    public $timestamps=false;
}
