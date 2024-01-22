<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class Biometrico extends Model
{
    //
    protected $table = 'rrhh.biometricos';

    protected $fillable = [
        'nombre',
        'lugar',
        'ip',
        'puerto',
        'estado',
        'version',
        'modelo',
        'Nserie',
        'fecha_creacion'
    ];

    protected $hidden = [
      'created_at', 'updated_at'
    ];

}
