<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function storeReporte(Request $request){
        $nombres=$request->input('datos')["nombres"];
        $keys=[];
        foreach ($request->all() as $key => $value) {
            if($key!='datos'){
                array_push($keys,$key." as ".$nombres[$key]);
            }
        }

        $condiciones=[];
        foreach ($request->all() as $key => $value) {
            if($key!='datos' && count($value)>0){
                foreach ($value as $keyy => $item) {   // $value=[{operador,condicion},{operador,condicion}..]
                    $condicion=[$key,$item["operador"],$item["condicion"]];
                    array_push($condiciones,$condicion);
                }
            }
        }

        $tabla=$request->input('datos')["tabla"];
        $orden=$request->input('datos')["ordenar"]["orden"];
        $columna=$request->input('datos')["ordenar"]["atributo"];
        $union=$request->input('datos')["union"];
        $datosUnion=[];
        array_push($datosUnion, $tabla);array_push($datosUnion, $union);
        $reporte=DB::table($tabla)
        ->select($keys)
        ->when( $datosUnion,function ($query,$datosUnion) {
            foreach ($datosUnion[1] as $key => $value) {
                // $query->join($value["tabla"], $datosUnion[0].'.'.$value["idR"], '=', $value["tabla"].'.id');
                $query->join($value["tabla"], $value["primero"], '=', $value["segundo"]);   //la version actualizada   -> 09/07/2019
            }
        })
        ->where($condiciones)->orderBy($columna,$orden)
        ->get();   //todo array visualizado se lo convierte en JSON
 
        return response()->json($reporte);

    }

}
