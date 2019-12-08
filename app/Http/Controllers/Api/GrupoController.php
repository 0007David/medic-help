<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class GrupoController extends Controller
{
   
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
