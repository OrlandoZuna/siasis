<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasactualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.asistenciasactual', function (Blueprint $table) {
            $table->id();
            $table->string('title',200); //estado y tipo
            $table->string('nombre',200); 
            $table->string('ci_a'); // el id de usuario y ci d
            $table->integer('id_horario'); //id del hoarrio biometrico
            $table->integer('id_persona'); // id de la persona // la ip y el id de horario
            $table->string('descripcion',200); // nombre del horario
            $table->string('start',100);// el timestamp y fecha 
            $table->string('end',100);
            $table->time('hora');  //el timestamp y fecha
            $table->string('turno_a');
            $table->string('tipo_a');
            $table->string('estado_a');
            $table->float('valor_asistencia');
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
        Schema::dropIfExists('rrhh.asistenciasactual');
    }
}

