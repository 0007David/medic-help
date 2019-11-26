<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function person()
    {
        return $this->morphOne('App\Person', 'peopleable');
    }
}
