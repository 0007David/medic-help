<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','estado'];

    public function permisos()
    {
        return $this->belongsToMany('App\Permiso','rol_permisos','rol_id','permiso_id')
        ->using('App\RolPermiso');
    }

    public function users(){

        return $this->hasMany('App\User');

    }
}
