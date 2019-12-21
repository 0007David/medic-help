<?php

namespace App\Http\Controllers;


use App\employee_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return employee_group::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employees_groups  $employees_groups
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id_employee=$request['id_employee'];
        $id_group=$request['id_group'];
        $nuevo= employee_group::where('id_employee',$id_employee)->where('id_group',$id_group)->get();
        return $nuevo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees_groups  $employees_groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees_groups $employees_groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employees_groups  $employees_groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees_groups $employees_groups)
    {
        //
    }

    public function Grupos_de_Empleado(Request $request)
    {
        $id_empleado = $request->id_empleado;

        $result =  DB::select('SELECT groups.id,groups.nombre, groups.descripcion FROM groups,employees_groups WHERE groups.id = employees_groups.id_group AND employees_groups.id_employee = :id',['id' => $id_empleado]);

       
     return response()->json($result);
    
    }





}
