<?php

namespace Modules\Valhalla\Entities;

use Illuminate\Database\Eloquent\Model;

class Aplication extends Model
{
    protected $table="valhalla.aplications";
    protected $fillable = [
      'icono',
      'nombre',
      'descripcion',
      'enlace',
      'tipo',
      'publicacion',
      'archivo',
    ];
}
