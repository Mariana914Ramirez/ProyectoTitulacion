<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = "horario";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'DoctorConsultorio',
    	'Hora_inicio',
    	'Hora_termino',
    	'Dia'
    ];

    public $timestamps=false;
}
