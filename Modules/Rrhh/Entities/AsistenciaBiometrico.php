<?php
namespace Modules\Rrhh\Entities;

use Illuminate\Database\Eloquent\Model;

class AsistenciaBiometrico extends Model
{
    //
        //
        protected $table = 'rrhh.asistenciasbiometrico';

        protected $fillable = [
            'Nregistro',
            'id_biometrico',
            'id_user_b',
            'state',
            'timestamp',
            'type',
        ];
        protected $hidden = [
          'created_at', 'updated_at'
        ];
}