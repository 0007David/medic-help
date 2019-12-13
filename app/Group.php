<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public function Group(){
        return $this->hasMany('App\Employee_Person');
    }

    public function employees(){
        return $this->belongsToMany('App\Employee','employees_groups','id_group','id_employee')
        ->using('App\employee_group');
        
    }

    public function documents(){

        return $this->belongsToMany('App\Document','document_groups','group_id','document_id')->using('App\DocumentGroup');

    }
}
