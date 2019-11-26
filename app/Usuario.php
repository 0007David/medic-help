<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    

    public function Usuario()
    {
        return $this->hasOne('App\Employee');
    }
    
}
