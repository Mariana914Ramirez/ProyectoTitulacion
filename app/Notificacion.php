<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = "notificaciones";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Receptor',
    	'Emisor',
    	'Notificacion',
    	'Hora'
    ];

    public $timestamps=false;
}
