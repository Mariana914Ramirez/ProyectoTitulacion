<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioConsultorio extends Model
{
    protected $table = "comentariosconsultorios";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Consultorio',
    	'Usuario',
    	'Comentario',
    	'Hora'
    ];

    public $timestamps=false;
}
