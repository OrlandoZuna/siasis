<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_bigs', function (Blueprint $table) {
            $table->id();
            $table->integer('mifirma_id');
            $table->date('fecha');
            $table->string('llave_anterior');
            $table->string('llave_actual');
            $table->string('estado_anterior');
            $table->string('estado_actual');
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
        Schema::dropIfExists('log_bigs');
    }
}
