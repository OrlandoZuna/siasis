<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Apps\Entities\Cabezera;

class GrupoPersona extends Model
{
    protected $table = 'rrhh.grupo_persona';

    protected $fillable = [
        'personal_id',
        'grupo_trabajo_id',
        'ci',
        'nombre_persona',
        'nonbre_grupotrabajo'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];

    public function horarios(){
    	return $this->belongsToMany(Horario::class, 'rrhh.grupo_horario')
            ->withTimestamps();
    }
}
