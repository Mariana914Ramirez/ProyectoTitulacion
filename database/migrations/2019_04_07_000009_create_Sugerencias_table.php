<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugerenciasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Sugerencias';

    /**
     * Run the migrations.
     * @table Sugerencias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Usuario')->unsigned();
            $table->string('Sugerencia', 100);

            $table->index(["Usuario"], 'fk_Sugerencias_Usuario_idx');


            $table->foreign('Usuario', 'fk_Sugerencias_Usuario_idx')
                ->references('Registro')->on('Usuarios')
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
