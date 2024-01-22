<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlujosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flujos', function (Blueprint $table) {
            $table->id();
            $table->integer('gestion_id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('flujodetalle', function (Blueprint $table) {
            $table->id();
            $table->integer('flujo_id');
            $table->integer("unidad_id");
            $table->string('name')->nullable();
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
        Schema::dropIfExists('flujos');
        Schema::dropIfExists('flujodetalle');
    }
}
