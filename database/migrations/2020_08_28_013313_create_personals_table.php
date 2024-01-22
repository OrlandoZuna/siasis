<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->default("user.png");
            $table->string('ci')->unique();
            $table->enum('extension', ['LP', 'OR', 'PT', 'CB', 'SC', 'BN', 'PA', 'TJ', 'CH'])->default('PT');
            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->enum('genero', ['masculino', 'femenino'])->default('masculino');
            $table->date('fecha_nacimiento')->nullable();
            $table->boolean("mayor_edad")->default(false);
            $table->string('estado_civil')->nullable();
            
            $table->string('direccion')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono_coorpo')->nullable();
            $table->string('correo_electronico')->nullable();
            
            
            $table->string('numero_cuenta')->unique()->nullable();
            $table->string('profecion')->nullable();
            $table->string('seguro_social')->nullable();
            $table->date("fecha_inicio_laboral");
            $table->integer("age_antiguedad")->default(0);
            
            $table->bigInteger('unidad_id')->unsigned()->default(0);
            $table->bigInteger('horario_id')->unsigned()->default(0);
            $table->string('licencia_conduction')->nullable();
            $table->string('categoria')->nullable();
            $table->enum('estado_laboral',['ACTIVO','BAJA']);
            $table->string('ap_casado')->nullable();
            $table->enum('tipo',['administrativo','docente','ambos'])->default('administrativo');
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
        Schema::dropIfExists('personals');
    }
}
