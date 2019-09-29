<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class UsuarioController extends Controller
{
    public function registrar(Request $request)
    {
        $nombre = $request['nombre'];
        if (!Usuario::where('nombre', $nombre)->exists()) {
            $usuario = new Usuario();
            $usuario->nombre = $request['nombre'];
            $usuario->contraseña = Hash::make($request['contraseña']);
            $usuario->id_employee = $request['id_employee'];
            $usuario->save();
            return "Usuario Creado";
        }
        return "Error Usuario ya existe existe";
    }


    public function login(Request $request)
    {
        $nombre = $request->nombre;
        $contraseña = Usuario::where('nombre', $nombre)->select('contraseña')->get();
        if (Usuario::where('nombre', $nombre)->exists()) {
            if (password_verify(($request->contraseña),$contraseña)) {
                
            }else{
                password_verify($request->contraseña, $contraseña);
                echo $contraseña;
                echo hash::make($request->contraseña);
            }
        } else {
            return "Denegado";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
