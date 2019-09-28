<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    public function Security(){
        return $this->hasMany('App\Group');
    }
}
