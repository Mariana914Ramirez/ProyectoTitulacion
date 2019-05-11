<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Imagen';

    /**
     * Run the migrations.
     * @table Imagen
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Consultorio')->unsigned();
            $table->string('Imagen', 256);

            $table->index(["Consultorio"], 'fk_Imagen_Consultorio_idx');


            $table->foreign('Consultorio', 'fk_Imagen_Consultorio_idx')
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
