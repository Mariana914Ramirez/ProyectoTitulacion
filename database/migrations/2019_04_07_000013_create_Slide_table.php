<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Slide';

    /**
     * Run the migrations.
     * @table Slide
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Registro');
            $table->integer('Consultorio')->unsigned();
            $table->string('Imagen', 256);
            $table->date('FechaInicio');
            $table->date('FechaFinal');
            $table->tinyInteger('Aceptado');

            $table->index(["Consultorio"], 'fk_Slide_Consultorios_idx');


            $table->foreign('Consultorio', 'fk_Slide_Consultorios_idx')
                ->references('Registro')->on('Consultorios')
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
