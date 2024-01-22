    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh.horario_persona', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personal_id');
            $table->bigInteger('horario_id');
            $table->string('title', 100);
            $table->string('ci', 20);
            $table->string('nombre_h', 100);
            $table->string('unidad', 150);
            $table->float('work_day');
            $table->string('start',100);
            $table->string('end',100);
            $table->string('color',20);
            $table->foreign('personal_id')->references('id')->on('rrhh.personas')->onDelete('cascade');
            $table->foreign('horario_id')->references('id')->on('rrhh.horarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /** Modules\Rrhh\Database\Migrations\2022_08_09_004118_create_horario_persona_table.php
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rrhh.horario_persona');
    }
}
