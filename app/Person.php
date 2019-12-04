<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{	
	protected $table = 'people';
    protected $fillable = ['ci','nombre','apellido','telefono','fecha_nacimiento','email','sexo','estado'];

    public function peopleable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->hasOne('App\User');
    }

    //relacionando User con persona
    public function usuario()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }

}
