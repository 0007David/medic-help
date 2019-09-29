<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Group::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group=new Group();
        $group->descripcion=$request['descripcion'];
        $group->nombre=$request['nombre'];
        $group->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(request $id)
    {   
        $group=Group::find($id['id']);
        return Response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $group= Group::find($request['id']);
        $group->nombre=$request['nombre'];
        $group->descripcion=$request['descripcion'];
        $group->save();
        return Response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $group=Group::findOrFail($request['id']);
        $group->delete();
    }
}
