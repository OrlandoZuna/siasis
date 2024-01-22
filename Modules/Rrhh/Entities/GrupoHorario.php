<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class GrupoHorario extends Model
{
    protected $table = 'rrhh.grupo_horario';

    protected $fillable = [
        'grupo_persona_id',
        'horario_id',
        'horario_id',
        'persona_id',
        'title',
        'ci',
        'nombre_h',
        'unidad',
        'work_day',
        'start',
        'end',
        'color'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}
