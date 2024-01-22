<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposalidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.tiposalida', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_tiposalida', 100);
            $table->string('bonote', 10)->default('no');
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
        Schema::dropIfExists('rrhh.tiposalida');
    }
}
//Modules\Rrhh\Database\Migrations\2022_08_25_221309_create_tiposalida_table.php