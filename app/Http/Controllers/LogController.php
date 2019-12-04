<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    
    public static function storeLog($tipo,$accion ,$tabla, $quien,$descripcion){

        date_default_timezone_set('UTC');
        $date = date("D M d, Y h:i:sa", time());
        if(Storage::disk('local')->exists('medic-help.log')){
            $content = '::) [ '.$date.' ] "'. $tipo.' / HTTP/1.1" - "'.$accion. '" - "'. $tabla.'" - "'.$quien. '" - "'.$descripcion.'" ::(';
            // Storage::disk('local')->put('medic-help.log', $content);
            Storage::append('medic-help.log', $content);
        }else{
            $fileName = "medic-help.log"; $content = '::) [ '.$date.' ] "'. $tipo.' / HTTP/1.1" - "'.$accion. '" - "'. $tabla.'" - "'.$quien. '" - "'.$descripcion.'" ::(';
            Storage::disk('local')->put($fileName, $content);
        
        }

    }
}
