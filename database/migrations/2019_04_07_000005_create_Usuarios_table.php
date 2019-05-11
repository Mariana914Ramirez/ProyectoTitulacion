<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Usuarios';

    /**
     * Run the migrations.
     * @table Usuarios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Registro');
            $table->string('Correo', 50);
            $table->string('Nombre', 50);
            $table->string('Apellidos', 60);
            $table->bigInteger('Telefono');
            $table->char('Sexo', 1)->nullable();
            $table->string('Password', 256);
            $table->string('CorreoRecuperacion', 50);
            $table->date('FechaNacimiento');

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
