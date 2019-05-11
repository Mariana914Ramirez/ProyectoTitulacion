<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultoriosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Consultorios';

    /**
     * Run the migrations.
     * @table Consultorios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Registro');
            $table->string('Correo', 50);
            $table->integer('Estado')->unsigned();
            $table->integer('Municipio')->unsigned();
            $table->string('Nombre', 30);
            $table->bigInteger('Telefono');
            $table->string('Password', 256);
            $table->text('Ubicacion');
            $table->text('Descripcion');
            $table->float('Puntos');
            $table->float('C_precio');
            $table->float('C_limpieza');
            $table->float('C_puntualidad');
            $table->float('C_trato');
            $table->float('Mes_uno')->nullable();
            $table->float('Mes_dos')->nullable();
            $table->float('Mes_tres')->nullable();
            $table->float('Mes_cuatro')->nullable();
            $table->float('Mes_cinco')->nullable();
            $table->float('Mes_seis')->nullable();
            $table->string('CorreoRecuperacion', 50);
            $table->string('Imagen', 256);
            $table->tinyInteger('Revisado');

            $table->index(["Municipio"], 'fk_Consultorios_Municipios_idx');

            $table->index(["Estado"], 'fk_Consultorios_Estados_idx');


            $table->foreign('Estado', 'fk_Consultorios_Estados_idx')
                ->references('Registro')->on('Estado')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Municipio', 'fk_Consultorios_Municipios_idx')
                ->references('Registro')->on('Municipio')
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
