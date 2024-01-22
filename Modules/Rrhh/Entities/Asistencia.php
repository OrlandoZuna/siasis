<?php
namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
    protected $table = 'rrhh.asistencias';

    protected $fillable = [
        'id_horario',
        'id_persona',
        'ci_a',
        'turno_a',
        'tipo_a',
        'estado_a',
        'fecha',
        'hora'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}
