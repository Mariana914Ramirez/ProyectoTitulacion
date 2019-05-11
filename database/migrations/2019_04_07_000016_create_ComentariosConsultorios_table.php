<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosconsultoriosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ComentariosConsultorios';

    /**
     * Run the migrations.
     * @table ComentariosConsultorios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Consultorio')->unsigned();
            $table->integer('Usuario')->unsigned();
            $table->string('Comentario');
            $table->dateTime('Hora');

            $table->index(["Consultorio"], 'fk_ComentariosCon_Consultorio_idx');

            $table->index(["Usuario"], 'fk_ComentariosCon_Usuario_idx');


            $table->foreign('Consultorio', 'fk_ComentariosCon_Consultorio_idx')
                ->references('Registro')->on('Consultorios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Usuario', 'fk_ComentariosCon_Usuario_idx')
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
