<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\especialidadRequest;
use App\Especialidad;

class EspecialidadApiController extends Controller
{
    public function list(){
        return response()->json(Especialidad::get(), 200);
    }
    public function getEspecialidad(Request $request){
     return response()->json(Especialidad::find($request->id), 200);
    }
    public function insert(Request $request){
         $especialidad= new Especialidad();
         $especialidad->nombre=$request->nombre;
         $especialidad->status='1';
         $especialidad->save();
     //    $especialidad = Especialidad::create($request->all());
        return response()->json($especialidad, 201);
    }
    public function update(Request $request){
     $especialidad = Especialidad::findOrfail($request->id); //Recupera la especialidad usando el id
     $especialidad->update($request->all()); //actualiza la tupla con los datos nuevos
     return response()->json($especialidad, 200);
    }
    public function delete(Request $request){
     $especialidad = Especialidad::findOrfail($request->id); //Recupera la especialidad usando el id
     $especialidad->status='0'; 
     $especialidad->update();
     return response()->json($especialidad, 200);
    }
    public function activar(Request $request){
     $especialidad = Especialidad::findOrfail($request->id); //Recupera la especialidad usando el id
     $especialidad->status='1'; 
     $especialidad->update();
     return response()->json($especialidad, 200);
    }
}
