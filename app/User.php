<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','estado'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $temas = array(
        'DARK DRACULA' => array(
            'nav' => 'main-header navbar navbar-expand navbar-dark',
            'aside' => 'main-sidebar sidebar-dark-primary elevation-4',
            'a' => 'brand-link'
        ),
        'LIGHT' => array(
            'nav' => 'main-header navbar navbar-expand navbar-light',
            'aside' => 'main-sidebar elevation-4 sidebar-light-primary',
            'a' => 'brand-link'
        ),
        'BLUE' => array(
            'nav' => 'main-header navbar navbar-expand navbar-dark navbar-primary',
            'aside' => 'main-sidebar elevation-4 sidebar-light-primary',
            'a' => 'brand-link navbar-primary'
        ),
        'GREEN' => array(
            'nav' => 'main-header navbar navbar-expand navbar-dark navbar-success',
            'aside' => 'main-sidebar elevation-4 sidebar-light-success',
            'a' => 'brand-link navbar-success'
        ),
        'GRAY' => array(
            'nav' => 'main-header navbar navbar-expand navbar-dark navbar-gray',
            'aside' => 'main-sidebar elevation-4 sidebar-light-teal',
            'a' => 'brand-link navbar-gray'
        ),
        'DEFAULT' => array(
            'nav' => 'main-header navbar navbar-expand navbar-white navbar-light',
            'aside' => 'main-sidebar sidebar-dark-primary elevation-4',
            'a' => 'brand-link'
        )
    );

    public function tema(){

        return $this->belongsTo('App\Tema');

    }

    public function rol(){

        return $this->belongsTo('App\Rol');

    }

    public function person(){
        return $this->belongsTo('App\Person');
    }
    public function getTemaNavBarAttribute(){
        if($this->tema != null){
            return $this->temas[$this->tema->nombre]['nav'];
        }
        return $this->temas['DEFAULT']['nav'];
    }

    public function getTemaAsideAttribute(){
        if($this->tema != null){
            return $this->temas[$this->tema->nombre]['aside'];
        }
        return $this->temas['DEFAULT']['aside'];
    }

    public function getTemaLogoAttribute(){
        if($this->tema != null){
            return $this->temas[$this->tema->nombre]['a'];
        }
        return $this->temas['DEFAULT']['a'];
    }

}
