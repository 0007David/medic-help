<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
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
    protected $fillable = ['nombre'];

    public function rols(){
        return $this->belongsToMany('App\Rol','rol_permisos','permiso_id','rol_id')->using('App\RolPermiso');

    }
}
