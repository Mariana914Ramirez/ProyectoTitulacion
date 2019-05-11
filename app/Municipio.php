<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'Municipio';
    protected $primaryKey="Registro";

    public $timestamps=false;

    protected $fillable =[
    	'Estado',
    	'Nombre',
    	'Numero'
    ];

    public static function municipio($Registro)
    {
    	return Municipio::where('Estado', '=', $Registro)->get();
    }
}
