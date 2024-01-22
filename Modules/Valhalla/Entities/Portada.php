<?php

namespace Modules\Valhalla\Entities;

use Illuminate\Database\Eloquent\Model;

class Portada extends Model
{
    protected $table='valhalla.portadas';
    protected $fillable = [
      'objetivo',
      'descripcion',
      'fondo',
      'logo',
    ];
}
