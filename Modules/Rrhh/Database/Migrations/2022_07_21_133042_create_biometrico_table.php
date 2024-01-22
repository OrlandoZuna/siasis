<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiometricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.biometricos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('lugar', 200);
            $table->string('ip',50);
            $table->string('puerto',50);
            $table->string('estado', 20);
            $table->string('version', 100);
            $table->string('modelo', 150);
            $table->string('Nserie', 150);
            $table->DateTime('fecha_creacion');
            $table->timestamps();
        });
    }
    //Modules\Rrhh\Database\Migrations\2022_07_21_133042_create_biometrico_table.php
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh.biometricos');
    }
} 
