<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['ci','nombre','apellido','telefono','fecha_nacimiento'];

    public function peopleable()
    {
        return $this->morphTo();
    }
}
