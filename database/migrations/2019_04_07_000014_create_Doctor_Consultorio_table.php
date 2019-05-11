<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorConsultorioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Doctor_Consultorio';

    /**
     * Run the migrations.
     * @table Doctor_Consultorio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Consultorio')->unsigned();
            $table->integer('Doctor')->unsigned();

            $table->index(["Consultorio"], 'DoctorConsultorio_idx');

            $table->index(["Doctor"], 'DoctorConsultorio_Doctor_idx');


            $table->foreign('Consultorio', 'DoctorConsultorio_idx')
                ->references('Registro')->on('Consultorios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Doctor', 'DoctorConsultorio_Doctor_idx')
                ->references('Registro')->on('Doctores')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
