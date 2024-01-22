<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMifirmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mifirmas', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("securiti_id");
            $table->string('respuesta_unica');
            $table->string('respuesta_recuperacion');
            $table->enum('estado',['unica','recuperado','cambiado','renovado'])->default('unica');
            $table->date('vali_ini');
            $table->date('vali_fin');
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
        Schema::dropIfExists('mifirmas');
    }
}
