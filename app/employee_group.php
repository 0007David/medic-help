<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class employee_group extends Pivot
{
    public function employee_group(){
        return $this->belongsTo('App\Employee');
    }

    public function comentarios(){
        return $this->hasMany('App\Comentario');
    }
}
