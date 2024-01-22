<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    protected $table="public.role_user";
    protected $fillable=[
        'role_id','user_id'
    ];

    public function Rolname(){
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
