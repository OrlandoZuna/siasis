<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valhalla.portadas', function (Blueprint $table) {
            $table->id();
            $table->longText('objetivo')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('fondo')->default('1');
            $table->longText('logo')->default('1');
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
        Schema::dropIfExists('valhalla.portadas');
    }
}
