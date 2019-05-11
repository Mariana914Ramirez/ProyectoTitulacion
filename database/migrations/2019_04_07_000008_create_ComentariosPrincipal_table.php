<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosprincipalTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ComentariosPrincipal';

    /**
     * Run the migrations.
     * @table ComentariosPrincipal
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->integer('Usuario')->unsigned();
            $table->string('Comentario');
            $table->dateTime('Hora');

            $table->index(["Usuario"], 'fk_ComentariosPrin_Usuario_idx');


            $table->foreign('Usuario', 'fk_ComentariosPrin_Usuario_idx')
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
