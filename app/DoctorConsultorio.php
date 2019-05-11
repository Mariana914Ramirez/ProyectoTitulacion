<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorConsultorio extends Model
{
    protected $table = "doctor_consultorio";
    protected $primaryKey="Registro";

    protected $fillable =[
    	'Consultorio',
    	'Doctor'
    ];

    public $timestamps=false;
}
