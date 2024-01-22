<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.personas', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->default("user.png");
            $table->string('ci')->unique();
            $table->string('extension');
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->enum('genero', ['masculino', 'femenino','otros'])->default('masculino');
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean("mayor_edad")->default(false);
            $table->string('estado_civil')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono_coorpo')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('profecion')->nullable();

            $table->string('libreta_militar')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->string('clase_de_documento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh.personas');
    }
}
