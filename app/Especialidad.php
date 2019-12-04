<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    public $timestamps = 'false';
    protected $fillable = [
        'nombre',
        'status',
    ];


    // public function Especialidad(){
    //     return $this->hasMany('App\Empleado_Especialidad');
    // }

//    protected $fillable = ['nombre','estado'];
    

    public function employees(){

        return $this->belongsToMany('App\Employee','empleado_especialidads','empleado_id','especialidad_id')->using('App\EmpleadoEspecialidad');

    }


}
