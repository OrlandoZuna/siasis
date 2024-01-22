<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class HorarioPersona extends Model
{
    //
    protected $table = 'rrhh.horario_persona';

    protected $fillable = [
        'personal_id',
        'horario_id',
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
