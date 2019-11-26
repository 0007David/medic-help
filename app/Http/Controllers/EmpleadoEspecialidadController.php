<?php

namespace App\Http\Controllers;

use App\Empleado_Especialidad;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoEspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Empleado_Especialidad::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado_Especialidad= new Empleado_Especialidad();
        $empleado_Especialidad->id_employee=$request['id_employee'];
        $empleado_Especialidad->id_especialidads=$request['id_especialidads'];
        $empleado_Especialidad->store();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado_Especialidad  $empleado_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Request $Request)
    {
        $empleado_Especialidad= Empleado_Especialidad::findOrfail($Request['id']);
        return Response()->json($empleado_Especialidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado_Especialidad  $empleado_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $empleado_Especialidad= Empleado_Especialidad::findOrFail($request['id']);
        $empleado_Especialidad->nombre=$request['nombre'];
        return Response()->json($empleado_Especialidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado_Especialidad  $empleado_Especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        $empleado_Especialidad= Empleado_Especialidad::findOrFail($request['id']);
        $empleado_Especialidad->delete();        
        
    }
}
