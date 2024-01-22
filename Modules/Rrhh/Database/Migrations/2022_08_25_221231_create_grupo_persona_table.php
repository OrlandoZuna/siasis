<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.grupo_persona', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->bigInteger('grupo_trabajo_id');
            $table->string('ci', 20);
            $table->string('nombre_persona', 200);
            $table->string('nonbre_grupotrabajo', 100);
            $table->foreign('personal_id')->references('id')->on('rrhh.personas')->onDelete('cascade');
            $table->foreign('grupo_trabajo_id')->references('id')->on('rrhh.grupotrabajo')->onDelete('cascade');
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
        Schema::dropIfExists('rrhh.grupo_persona');
    }
}