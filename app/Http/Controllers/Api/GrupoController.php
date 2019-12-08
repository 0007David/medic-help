<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class GrupoController extends Controller
{
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getGrupoDeUsuario(Request $request){ //asumo que usario existe
        //validar si ese usuario es de tipo empleado
        $respuesta = array(); $usuario = User::find($request->id);
        if( $usuario->person['peopleable_type'] == "App\Employee"){
            //usuario es empleado

            $idEmpleado = $usuario->person['peopleable_id'];
            $gruposEmpleado = Employee::find($idEmpleado)->groups;

            $respuesta["data"] = $gruposEmpleado;

        }else{
            $respuesta["data"] = "usurio tipo Paciento no tiene grupos";

        }
        echo json_encode($respuesta);

    }
}
