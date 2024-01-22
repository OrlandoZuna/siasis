<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class AssiteciaActual extends Model
{
    protected $table = 'rrhh.asistenciasactual';

    protected $fillable = [
        'title',
        'nombre',
        'ci_a',
        'id_horario',
        'id_persona',
        'descripcion',
        'start',
        'end',
        'hora',
        'turno_a',
        'tipo_a',
        'estado_a',
        'valor_asistencia',
        'color'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}