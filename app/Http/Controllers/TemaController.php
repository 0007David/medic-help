<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\User;
use Illuminate\Support\Facades\Auth;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // storeLog($tipo,$accion ,$tabla, $quien,$descripcion)
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'peticion del formulario de temas';
        LogController::storeLog('GET','obtener','Temas',$quien,$descripcion);
        return view('temas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!preg_match("/^[[:digit:]]+$/",$request->fontSize) && $request->nombre!= "" && $request->fuente!="") return back();

        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'almacena un tema';
        LogController::storeLog('POST','almacenar','Temas',$quien,$descripcion);
        
        $userActual = User::find(Auth()->user()->id);
        if( !isset($userActual->tema) ){
            $tema = new Tema();
            $tema->nombre = $request->nombre;
            $tema->fuente = $request->fuente;
            $tema->fontSize = $request->fontSize;
            $tema->save();
            $idTema = Tema::all()->max()->id;
        }else{
            $tema = Tema::find($userActual->tema->id);
            $tema->nombre = $request->nombre;
            $tema->fuente = $request->fuente;
            $tema->fontSize = $request->fontSize;
            $tema->save();
            $idTema = $userActual->tema->id;
        }
        $userActual->tema_id = $idTema;
        $userActual->save();
        
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userActual = User::find(Auth()->user()->id); $answer= array();
        if(isset($userActual->tema)){
            $tema = $userActual->tema;
            $answer['status'] = true;
            $answer['data'] = $tema;
        }else{
            $answer['status'] = false;
        }
        return response()->json($answer);
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
}
