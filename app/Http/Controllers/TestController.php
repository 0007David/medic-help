<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    
    public function indexReporte(){
        return view('admin.reportes.index');
    }

}
