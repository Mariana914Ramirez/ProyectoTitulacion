<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Estudios';

    /**
     * Run the migrations.
     * @table Estudios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Especialidad')->unsigned();
            $table->integer('Doctor')->unsigned();


            $table->index(["Especialidad"], 'fk_Estudios_Especialidad_idx');

            $table->index(["Doctor"], 'fk_Estudios_Doctores_idx');


            $table->foreign('Especialidad', 'fk_Estudios_Especialidad_idx')
                ->references('Registro')->on('Especialidad')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Doctor', 'fk_Estudios_Doctores_idx')
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
