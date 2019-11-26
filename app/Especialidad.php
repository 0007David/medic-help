<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    public $timestamps = 'false';

    
    public function Especialidad(){
        return $this->hasMany('App\Empleado_Especialidad');
    }
}
