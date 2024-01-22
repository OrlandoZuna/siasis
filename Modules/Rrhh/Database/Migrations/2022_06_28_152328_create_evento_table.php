<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.evento', function (Blueprint $table) {
            $table->id();
            $table->string('title',100); 
            $table->bigInteger('tiposalida_id'); 
            $table->time('inicio_time');//nombre
            $table->time('fin_evento');
            $table->string('start',100);
            $table->string('end',100);
            $table->integer('id_horario');
            $table->integer('id_persona');
            $table->string('color',20);
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
        Schema::dropIfExists('rrhh.evento');
    }
}
