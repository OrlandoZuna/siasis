<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.asistencias', function (Blueprint $table) {
            $table->id();
            $table->biginteger('id_horario');
            $table->biginteger('id_persona');
            $table->string('ci_a');
            $table->string('turno_a');
            $table->string('tipo_a');
            $table->string('estado_a');
            $table->date('fecha');
            $table->time('hora');
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
        Schema::dropIfExists('rrhh.asistencias');
    }
}
