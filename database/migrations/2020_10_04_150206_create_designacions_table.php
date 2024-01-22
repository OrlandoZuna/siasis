<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designacions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carrera')->unsigned()->default(0);
            $table->bigInteger('personal')->unsigned()->default(0);
            $table->bigInteger('rol')->unsigned()->default(0);
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
        Schema::dropIfExists('designacions');
    }
}
