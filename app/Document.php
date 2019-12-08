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
}
