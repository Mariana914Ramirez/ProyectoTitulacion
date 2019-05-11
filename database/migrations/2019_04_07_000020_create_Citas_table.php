<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Citas';

    /**
     * Run the migrations.
     * @table Citas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->bigInteger('DoctorConsultorio')->unsigned();
            $table->integer('Usuario')->unsigned();
            $table->bigInteger('Horarios')->unsigned();
            $table->tinyInteger('Asistir')->nullable();

            $table->index(["Usuario"], 'fk_Citas_Usuario_idx');

            $table->index(["Horarios"], 'fk_Citas_Horario_idx');

            $table->index(["DoctorConsultorio"], 'fk_Citas_Doctor_Consultorio_idx');


            $table->foreign('Usuario', 'fk_Citas_Usuario_idx')
                ->references('Registro')->on('Usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Horarios', 'fk_Citas_Horario_idx')
                ->references('Registro')->on('Horario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('DoctorConsultorio', 'fk_Citas_Doctor_Consultorio_idx')
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
