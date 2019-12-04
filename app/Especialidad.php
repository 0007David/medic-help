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

    protected $fillable = ['nombre','estado'];
    

    public function employees(){

<<<<<<< HEAD
        return $this->belongsToMany('App\Employee')->using('App\EmpleadoEspecialidad');
=======
        return $this->belongsToMany('App\Employee','empleado_especialidads','empleado_id','especialidad_id')->using('App\EmpleadoEspecialidad');

>>>>>>> 85b5b65a05b448f5197f7a870ec468f4243ae660
    }


}
