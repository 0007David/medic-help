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

        return $this->belongsToMany('App\Especialidad','empleado_especialidads','especialidad_id','empleado_id')
        ->using('App\EmpleadoEspecialidad');
    }

    public function groups(){

        return $this->belongsToMany('App\Group','employees_groups','id_employee','id_group')
        ->withPivot('id','descargar', 'lectura','ocultar','rolGrupo');

    }

    public function documents(){
        return $this->hasMany('App\Document');
    }
}
