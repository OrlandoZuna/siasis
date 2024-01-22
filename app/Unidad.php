<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Modules\Iris\Entities\Puntos;
use App\Pedido;
class Unidad extends Model
{
  protected $table = 'public.unidads';
  protected $fillable = [
    'unidad_id',
    'user_id',
    'tipo',
    'name',
    'estructura',
    'codigo',
    'abreviado',
  ];
  public function Unidad()
  {
    return $this->belongsTo(Unidad::class, 'unidad_id');
  }
  public function User()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function Pun()
  {
    // dd('hola');
    return $this->belongsToMany(Puntos::class, 'iris.mis_puntos', 'id_unidad', 'id_puntos');
  }
  public function pedCount(){
    return Pedido::where([['matped',true],['estatus_pedidos','pedido'],['unidad_solicitante',$this->id]])->count();
  }
}
