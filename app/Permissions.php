<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{

    protected $fillable=["name","slug","description","model","typo"];

    public function getTipoAttribute(){
		$d=$this->model;
		$arr=explode(' - ', $d);
		return $arr[0];
    }
}
