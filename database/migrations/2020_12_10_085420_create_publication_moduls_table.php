<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_moduls', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['interno','externo'])->default('interno');
            $table->string('permission')->nullable();
            $table->string('nombre')->nullable();
            $table->longText('decripcion')->nullable();
            $table->string('icono')->nullable();
            $table->string('color')->nullable();
            $table->string('color1')->nullable();
            $table->string('url_interna')->nullable();
            $table->string('url_externa')->nullable();
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
        Schema::dropIfExists('publication_moduls');
    }
}
