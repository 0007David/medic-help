<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

	protected $table = 'documents';
	public $timestamps = false;
    protected $fillable = [
    	'descripcion',
    	'estado',
    	'fecha_creacion',
    	'observaciones',
    	'url_archivo',
    	'url_archivo_global',
    	'id_patient',
    	'id_service',
    	'id_employee',
    ];


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
