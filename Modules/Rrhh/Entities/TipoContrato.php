<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $table = 'rrhh.tipo_contrato';

    protected $fillable = [
        'nombre_tipo_contrato',
        'tipo'
    ];
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}
