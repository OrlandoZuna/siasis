<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table="rrhh.horarios";
    protected $fillable=[
        'id','name','start_time','end_time','late_minutes',
        'early_minutes','start_input','end_input','start_output',
        'end_output','work_day','sum','color'
    ];

    public function personas(){
    	return $this->belongsToMany(Personal::class, 'rrhh.horario_persona')
            ->withTimestamps();
    }
    public function grupotrabajo(){
    	return $this->belongsToMany(GrupoTrabajo::class, 'rrhh.grupo_horario')
            ->withTimestamps();
    }
    public function grupopersona(){
    	return $this->belongsToMany(GrupoPersona::class, 'rrhh.grupo_horario')
            ->withTimestamps();
    }
}
