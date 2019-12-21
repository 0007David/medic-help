<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Group;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
   
    public function index()
    {
        $groups=Group::all();
        return response()->json($groups);
    }

    
    public function store(Request $request)
    {
        $group=new Group();
        $group->nombre=$request->input('nombre');
        $group->descripcion=$request->input('descripcion');
        $group->save();
    
        $idEmployee=Employee::getEmployeeByUser();
        $group->employees()->attach($idEmployee,['descargar'=>true,'lectura'=>true,'ocultar'=>true, 'rolGrupo'=>'ad']);
        return response()->json($group);
    }

    public function show($id)
    {
        $group=new Group();
        $group=Group::find($id);
        return response()->json($group);
    }

    public function showEmployeeByGroup($id){
        $group=new Group();
        $group=Group::find($id);
        $employeesGroup=DB::select(DB::raw("SELECT * FROM people,employees,employees_groups where people.peopleable_id=employees.id and employees_groups.id_employee=employees.id and employees_groups.id_group=$group->id"));
        return response()->json($employeesGroup);
    }

    public function update(Request $request, $id)
    {
        $group=Group::find($id);
        $group->fill($request->all());
        $group->save(); 
        return response()->json($group);
    }

    public function destroy($id)
    {
        //
    }
}
