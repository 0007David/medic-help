<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    public function user(){

        return $this->hasOne('App\User');
        
    }
}
