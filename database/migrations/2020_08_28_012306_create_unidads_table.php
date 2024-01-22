<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unidad_id');
            $table->bigInteger('user_id');
            $table->enum('tipo',['Unidad Mayor','Unidad Dependiente','Facultad','Carrera']);
            $table->string('name');
            $table->string('estructura')->nullable();
            $table->string('codigo')->nullable();
            $table->string('abreviado')->nullable();
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
        Schema::dropIfExists('unidads');
    }
}
