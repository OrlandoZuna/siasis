<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class DesignacionGrupo extends Model
{
    protected $table = 'rrhh.designaciongrupo';

    protected $fillable = [
        'id_persona',
        'id_grupotrabajo',
        'ci',
        'nonbre_grupotrabajo'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}


