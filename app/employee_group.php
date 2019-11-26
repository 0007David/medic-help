<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_group extends Model
{
    public function employee_group(){
        return $this->belongsTo('App\Employee');
    }
}
