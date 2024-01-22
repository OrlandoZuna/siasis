<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNombreHorarioToeventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rrhh.evento', function (Blueprint $table) {
            $table->string("nombre_horario")->nullable();
            $table->string("nombre_tiposalida")->default('tiposalida');
        });
    }

    /**
     * Reverse the migrations. database\migrations\Modules\Rrhh\Database\Migrations\2022_11_13_014259_add_nombre_horario_to_rrhh.evento_table.php
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rrhh.evento', function (Blueprint $table) {
          $table->string("nombre_horarios");
          $table->string("nombre_tiposalidas");
        });
    }
}
