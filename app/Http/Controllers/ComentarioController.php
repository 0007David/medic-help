<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Document;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function index()
    {
        return view('comentarios.index');
    }

    public function getCommentsByDocument($idDocument,$idGrupo){
        $comments=DB::table('comentarios')->join('documents','documents.id','=','comentarios.document_id')->join('employees_groups','comentarios.employees_groups_id','=','employees_groups.id')->join('employees','employees.id','=','employees_groups.id_employee')->join('people','people.peopleable_id','=','employees.id')->select('comentarios.id','comentarios.descripcion','comentarios.document_id','comentarios.employees_groups_id','comentarios.created_at','comentarios.updated_at','employees_groups.id_employee','employees_groups.id_group','people.nombre','people.apellido')->where('employees_groups.id_group','=',$idGrupo)->where('documents.id','=',$idDocument)->where('people.peopleable_type','=','App\Employee')->get();
        $doc=Document::find($idDocument);
        return view('comentarios.index',compact('comments','doc','idDocument','idGrupo'));
        // return $comments;
       
    }

    public function store(Request $request,$id_group,$id_documento)
    {
        $id_employee=Employee::getEmployeeByUser();
        $result = DB::table('employees_groups')->select('id')->where('id_employee', $id_employee)->where('id_group',$id_group)->first();
        $id_employee_group=$result->id;
        $comentario= new Comentario();
        $comentario->descripcion=$request->input('descripcion');
        $comentario->document_id=$id_documento;
        $comentario->employees_groups_id=$id_employee_group;
        $comentario->save();
        return back();
        // return $result;
    }
}
