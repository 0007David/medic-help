<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function Group(){
        return $this->hasMany('App\Employee_Person');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
