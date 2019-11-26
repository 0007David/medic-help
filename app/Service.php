<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $fillable = ['nombre'];
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
