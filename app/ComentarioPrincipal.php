<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComentarioPrincipal extends Model
{
    protected $table = "comentariosprincipal";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Usuario',
    	'Comentario',
    	'Hora'
    ];

    public $timestamps=false;

}
