<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasbiometricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.asistenciasbiometrico', function (Blueprint $table) {
            $table->id();
            $table->integer('Nregistro');
            $table->bigInteger('id_biometrico');
            $table->string('id_user_b',20);
            $table->string('state', 50); // entrada o salida
            $table->string('timestamp', 100);
            $table->string('type', 50);
            $table->timestamps();
        });
    }

    //php artisan migrate:refresh --path=Modules/Rrhh/Database/Migrations/2022_08_03_211514_create_asistenciasactual_table.php 
    // Modules\Rrhh\Database\Migrations\2022_08_03_211514_create_asistenciasactual_table.php   


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh.asistenciasbiometrico');
    }
}
