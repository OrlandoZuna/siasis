<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStormbreakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stormbreakers', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('titulo')->nullable();
            $table->string('permiso')->nullable();
            $table->string('permmision');
            $table->string('nombre_archivo');
            $table->string('path')->nullable();
            $table->string('tipo')->nullable();
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
        Schema::dropIfExists('stormbreakers');
    }
}
