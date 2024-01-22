<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table="roles";
    protected $fillable=[
        'name','slug','description','level','typo'
    ];
    public function permisos(){
    	return $this->belongsToMany('App\Permissions', 'permission_role', 'role_id', 'permission_id');
    }
}
