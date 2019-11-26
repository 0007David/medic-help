<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class EspecialidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Especialidad::all();
    }
    public function mostrarVista()
    {
        $data = Especialidad::all();
        return view('admin.especialidad.especialidad',['data'=>$data]);
    }


    public function index2(){
        $especialidad = Especialidad::all();
       // dd($especialidad);

       return view('admin.especialidad')->with(compact("especialidad"));
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $especialidad= new Especialidad();
        $especialidad->nombre=$request->nombre;
        $especialidad->save();
        return redirect('/especialidad');
        // return $especialidad;
        // print_r($request->input());
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $especialidad= Especialidad::findOrfail($request['id']);
        return Response()->json($especialidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */

    // Request $request
    public function update()
    {
        return view('admin.especialidad.especialidadEditar');
        // $especialidad=Especialidad::findOrfail($request['id']);
        // $especialidad->nombre=$request['nombre'];
        // $especialidad->save();
        // return Response()->json($especialidad);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $especialidad= Especialidad::findOrfail($request['id']);
        $especialidad->delete();
        
    }
}
