<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use App\Roles;
use App\Permissions;
use Modules\Rrhh\Entities\Personal;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;
  use HasRoleAndPermission;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password', 'ci'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  public function gestion()
  {
    return $this->belongsTo(Gestion::class);
  }
  public function role()
  {
    //dd('hola');
    return $this->belongsToMany(Roles::class, 'role_user', 'user_id', 'role_id');
  }
  public function permisos()
  {
    return $this->belongsToMany(Permissions::class, 'permission_user', 'user_id', 'permission_id');
  }
  public function administra()
  {
    return $this->belongsToMany(Unidad::class, 'admi_unidads', 'user_id', 'unidad_id');
  }
  public function almacen()
  {
    return $this->belongsToMany(Almacen::class, 'admi_almacen', 'user_id', 'almacen_id');
  }
  public function getUnidadAdmAttribute()
  {
    $uni_arr = \Auth::user()->administra()->pluck("id");
    return Unidad::with("empleados")->whereIn("id", $uni_arr)->get();
  }
  public function getPersonalAdmAttribute()
  {
    $unidad = \Auth::user()->unidad_adm;
    $emple = collect();
    foreach ($unidad as $u) {
      foreach ($u->empleados as $p) {
        $emple->push($p);
      }
    }
    return $emple;
  }
  public function getAlmacenAdmAttribute()
  {
    $uni_arr = \Auth::user()->almacen()->pluck("id");
    return Almacen::whereIn("id", $uni_arr)->get();
  }
  public function getArticulosAdmAttribute()
  {
    $unidad = \Auth::user()->unidad_adm;
    $emple = collect();
    foreach ($unidad as $u) {
      foreach ($u->empleados as $p) {
        $emple->push($p);
      }
    }
    return $emple;
  }
  public function Unidad()
  {
    return $this->belongsTo(Unidad::class, 'unidad_id');
  }
  public function Personal()
  {
    return $this->belongsTo(Personal::class, 'personal_id');
  }

  // Rest omitted for brevity

  /**
   * Get the identifier that will be stored in the subject claim of the JWT.
   *
   * @return mixed
   */
  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  /**
   * Return a key value array, containing any custom claims to be added to the JWT.
   *
   * @return array
   */
  public function getJWTCustomClaims()
  {
    return [];
  }
  public function mifirma(){
    return $this->hasOne(Mifirma::class,'user_id','id');
  }
  public function persona(){
    return $this->hasOne(Personal::class,'id','personal_id');
  }
}
