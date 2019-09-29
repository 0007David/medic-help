<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado_Especialidad extends Model
{   
    public function Empleado_Especialidad()
    {
        return $this->belongsTo('App\Employee');
    }
}
