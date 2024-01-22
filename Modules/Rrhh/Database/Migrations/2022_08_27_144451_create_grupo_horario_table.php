<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.grupo_horario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grupo_persona_id');
            $table->bigInteger('horario_id');
            $table->bigInteger('grupo_id');
            $table->bigInteger('persona_id');
            $table->string('title', 100);
            $table->string('ci', 20);
            $table->string('nombre_h', 100);
            $table->string('grupo', 150);
            $table->float('work_day');
            $table->string('start',100);
            $table->string('end',100);
            $table->string('color',20);
            $table->foreign('grupo_persona_id')->references('id')->on('rrhh.grupo_persona')->onDelete('cascade');
            $table->foreign('horario_id')->references('id')->on('rrhh.horarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.//Modules\Rrhh\Database\Migrations\2022_08_27_144451_create_grupo_horario_table.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh.grupo_horario');
    }
}
