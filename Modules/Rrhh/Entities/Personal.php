<?php

namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Apps\Entities\Cabezera;

class Personal extends Model
{
  protected $table = "rrhh.personas";
  protected $fillable = ['foto', 'ci', 'extension', 'nombres', 'apellido_paterno', 'apellido_materno', 'genero', 'fecha_nacimiento', 'mayor_edad', 'estado_civil', 'direccion', 'telefono_fijo', 'celular', 'telefono_coorpo', 'correo_electronico', 'profecion','libreta_militar','nacionalidad','lugar_nacimiento','clase_de_documento'];

  public function cabezeras()
  {
    return $this->hasMany(cabezera::class);
  }
  public function getCiCompletoAttribute()
  {
    return "$this->ci $this->extension";
  }
  public function getNombressAttribute()
  {
    return "$this->apellido_paterno $this->apellido_materno $this->nombres";
  }
  public function getCompletoAttribute()
  {
    return " $this->nombres  $this->apellido_paterno  $this->apellido_materno";
  }

  public function personalPl()
  {
    return $this->hasMany(PersonalPlanta::class);
  }

  public function horarios(){ 
    return $this->belongsToMany(Horario::class, 'rrhh.horario_persona')
      ->withTimestamps();
  }

  public function grupotrabajos(){ 
    return $this->belongsToMany(GrupoTrabajo::class, 'rrhh.grupo_persona')
      ->withTimestamps();
  }
}
