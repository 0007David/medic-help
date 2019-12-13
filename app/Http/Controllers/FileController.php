<?php

namespace App\Http\Controllers;

use App\File;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function generar_url($archivo)
    {
        Storage::disk('dropbox')->putFileAs(
            '/', 
            $archivo, 
            $archivo->getClientOriginalName()
        );
        $response = $this->dropbox->createSharedLinkWithSettings(
            $archivo->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        return $response['url'];
    }
    
}