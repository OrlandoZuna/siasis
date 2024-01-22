<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class EventoAsistecia extends Model
{
    protected $table="rrhh.evento";
    protected $fillable=[
        'id','title','descripcion', 'inicio_time', 'fin_evento', 'start','end','id_horario',
        'id_persona','color'
    ];
}
