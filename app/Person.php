<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{	
	protected $table = 'people';
    protected $fillable = ['ci','nombre','apellido','telefono','fecha_nacimiento','email','sexo','estado','user_id'];

    public function peopleable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
