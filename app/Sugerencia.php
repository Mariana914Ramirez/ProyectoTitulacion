<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugerencia extends Model
{
    protected $table = "sugerencias";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Usuario',
    	'Sugerencia'
    ];

    public $timestamps=false;
}
