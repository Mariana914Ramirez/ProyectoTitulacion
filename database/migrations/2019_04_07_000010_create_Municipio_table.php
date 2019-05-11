<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Municipio';

    /**
     * Run the migrations.
     * @table Municipio
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Registro');
            $table->integer('Estado')->unsigned();
            $table->string('Nombre', 60);
            $table->smallInteger('Numero');

            $table->index(["Estado"], 'fk_Municipio_Estado_idx');


            $table->foreign('Estado', 'fk_Municipio_Estado_idx')
                ->references('Registro')->on('Estado')
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
