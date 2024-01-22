<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->id();
            $table->string('dia')->nullable();
            $table->string('mes')->nullable();
            $table->string('gestion')->nullable();
            $table->string('completo')->nullable();
            $table->string('recordatorio')->nullable();
            $table->string('descripcion')->nullable();
            $table->enum('tipo',['unico','temporal'])->default('unico');
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
        Schema::dropIfExists('dias');
    }
}
