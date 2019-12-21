<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $table = 'patients';
    
    protected $fillable = ['nro_seguro'];
	
    public function person()
    {
        return $this->morphOne('App\Person', 'peopleable');
    }

    public function documents(){
        return $this->hasMany('App\Document');
    }

}
