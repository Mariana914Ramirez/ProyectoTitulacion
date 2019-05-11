<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estado';
    protected $primaryKey="Registro";

    public $timestamps=false;

    protected $fillable =[
    	'Nombre'
    ];
}
