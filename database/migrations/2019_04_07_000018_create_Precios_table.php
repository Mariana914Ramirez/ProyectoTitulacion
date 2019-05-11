<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Precios';

    /**
     * Run the migrations.
     * @table Precios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('Registro');
            $table->string('Descripcion', 200);
            $table->bigInteger('DoctorConsultorio')->unsigned();

            $table->index(["DoctorConsultorio"], 'fk_Precios_Doctor_Consultorio_idx');


            $table->foreign('DoctorConsultorio', 'fk_Precios_Doctor_Consultorio_idx')
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
