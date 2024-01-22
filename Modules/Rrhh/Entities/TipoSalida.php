<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoSalida extends Model
{
    protected $table = 'rrhh.tiposalida';

    protected $fillable = [
        'nombre_tiposalida',
        'bonote'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}
