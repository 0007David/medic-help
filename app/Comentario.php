<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    
    public function documents(){

        return $this->belongsTo('App\Document');

    }

    public function employees_groups(){
        return $this->belongsTo('App\employee_group');
    }
}
