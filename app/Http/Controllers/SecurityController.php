<?php

namespace App\Http\Controllers;

use App\Security;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $security= Security::all();
        return $security;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre=$request['nombre'];
        
        if(! Security::where('nombre', $nombre )->exists()){
            $security=new Security();
            $security->nombre=$request['nombre'];
            $security->descripcion=$request['descripcion'];
            $security->save();
            return $security;
        }    
            return "Ya existe este grupo";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   $nombre=$request['nombre'];
        $security=Security::where('nombre',$nombre)->firstOrFail();
        return $security;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $nombre=$request['nombre'];
        $security=Security::where('nombre',$nombre)->firstOrFail();
        $security->nombre=$nombre;
        $security->descripcion=$request['descripcion'];
        $security->save();
        return $security;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $nombre=$request['nombre'];
        $security=Security::where('nombre',$nombre)->delete();
    }
}
