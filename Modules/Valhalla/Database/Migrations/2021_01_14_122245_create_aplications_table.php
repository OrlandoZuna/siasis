<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valhalla.aplications', function (Blueprint $table) {
            $table->id();
            $table->longText('icono')->nullable();
            $table->string('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('enlace')->nullable();
            $table->enum('tipo',['website','app'])->default('app');
            $table->enum('publicacion',['local','web'])->default('web');
            $table->string('archivo')->nullable();
            $table->enum('estado',['activo','inactivo'])->default('activo');
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
        Schema::dropIfExists('valhalla.aplications');
    }
}
