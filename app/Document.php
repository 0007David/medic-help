<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    public function services()
    {
        return $this->belongsTo('App\Service');

    }
    public function patient(){

        return $this->belongsTo('App\Patient');

    }

    public function employee(){

        return $this->belongsTo('App\Employee');        
        
    }

    public function groups(){

        return $this->belongsToMany('App\Group','document_groups','document_id','group_id')->using('App\DocumentGroup');

    }

    public function comentarios(){

        return $this->hasMany('App\Comentario');

    }
}
