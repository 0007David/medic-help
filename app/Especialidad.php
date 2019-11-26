<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    public $timestamps = 'false';

    // public function Especialidad(){
    //     return $this->hasMany('App\Empleado_Especialidad');
    // }

    public function employees(){

        return $this->belongsToMany('App\Employee')->using('App\EmpleadoEspecialidad');
    }


}
