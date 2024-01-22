<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('late_minutes');
            $table->integer('early_minutes');
            $table->time('start_input');
            $table->time('end_input');
            $table->time('start_output');
            $table->time('end_output');
            $table->float('work_day');
            $table->string('color',20);
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
        Schema::dropIfExists('rrhh.horarios');
    }
}
