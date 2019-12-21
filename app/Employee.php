<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

	protected $table = 'employees';

    protected $fillable = ['type'];

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

    //accesor
    public function getFechaNacAttribute(){
        
        return Carbon\Carbon::parse($this->fecha_nacimiento)->format('d/m/Y');
    }

    static public function getEmployeeByUser(){
        $person=new Person();
        $person=Person::where('user_id', Auth()->user()->id)->first();
        $idEmployee=$person['peopleable_id'];
        return $idEmployee;
    }
}
