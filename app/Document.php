<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function services()
    {
        return $this->belongsTo('App\Service');
    }
}
