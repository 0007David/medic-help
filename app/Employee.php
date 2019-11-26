<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function person()
    {
        return $this->morphOne('App\Person', 'peopleable');
    }

    public function especialidads(){
        return $this->belongsToMany('App\Especialidad')->using('App\EmpleadoEspecialidad');
    }

    public function groups(){

        return $this->belongsToMany('App\Group')->using('App\employee_group');

    }

    public function documents(){

        return $this->hasMany('App\Document');
    
    }
}
