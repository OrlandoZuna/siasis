<?php

namespace Modules\Rrhh\Entities;


use Illuminate\Database\Eloquent\Model;
use Modules\Apps\Entities\Cabezera;

class GrupoTrabajo extends Model
{
    protected $table = 'rrhh.grupotrabajo';

    protected $fillable = [
        'nombre_trabajo'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];

    public function personass(){
    	return $this->belongsToMany(Personal::class, 'rrhh.grupo_persona')
          ->withTimestamps();
    }
    public function horarios(){
    	return $this->belongsToMany(Horarios::class, 'rrhh.grupo_horario')
            ->withTimestamps();
    }
}
