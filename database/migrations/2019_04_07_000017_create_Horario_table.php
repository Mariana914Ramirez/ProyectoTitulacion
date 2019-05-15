<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Horario';

    /**
     * Run the migrations.
     * @table Horario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->bigInteger('DoctorConsultorio')->unsigned();
            $table->time('Hora_inicio');
            $table->time('Hora_termino');
            $table->char('Dia', 1);

            $table->index(["DoctorConsultorio"], 'fk_Horario_DoctorConsultorio_idx');


            $table->foreign('DoctorConsultorio', 'fk_Horario_DoctorConsultorio_idx')
                ->references('Registro')->on('Doctor_Consultorio')
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
