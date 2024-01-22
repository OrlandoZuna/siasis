<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFondosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondos', function (Blueprint $table) {
            $table->id();
            $table->string('dia_ini');
            $table->string('dia_fin');
            $table->string('mes_ini');
            $table->string('mes_fin');
            $table->string('codigo');
            $table->string('logo');
            $table->string('body');
            $table->enum('accion',['si','no'])->default('si');
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
        Schema::dropIfExists('fondos');
    }
}
