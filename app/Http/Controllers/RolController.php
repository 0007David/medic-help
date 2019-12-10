<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rol;
use App\Permiso;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::all();

        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'Obtener todos los roles ';
        LogController::storeLog('GET','Obtener','Rol',$quien,$descripcion);

        return view('admin.roles.index')->with(compact('rols'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->estado = "a";
        $rol->save();
        return back();
    }
    public function storePermiso(Request $request){
        
        $rol = Rol::find($request->idRol);
        $rol->permisos()->detach();
        foreach($request->permisos as $key => $value){
            $rol->permisos()->attach($value);
        }
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'almacenar permisos ';
        LogController::storeLog('POST','Almacenar','Rol Permiso',$quien,$descripcion);
        return redirect('/roles');
    }

    public function getFormRoles($id){
        $rol = Rol::find($id);
        $permisos = Permiso::all();
        $permisosRight = array();
        $permisosLeft = array();
        
        //tiene Permisos
        
        foreach($permisos as $key => $value){
            if( $key%2 == 0){
                $permisosRight[] = $value;
            }else{
                $permisosLeft[] = $value;
            }
        }
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'Obtener formulario de asignar permisos a Rol ';
        LogController::storeLog('GET','almacenar','Rol',$quien,$descripcion);
        return view('admin.roles.formRolPermiso')->with(compact('rol','permisosRight','permisosLeft'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        if($request->ajax()) {
            $rol = Rol::all();
            return response()->json($rol); 
        }   
    }

    public static function getRolById($id)
    {
        
        $rol = Rol::find($id);
        return $rol;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rol = Rol::find($request->id);
        $rol->nombre = $request->nombre;
        $rol->estado = "a";
        $rol->save();
        //LOG
        $quien = 'id: '. Auth()->user()->id. ' name: '.Auth()->user()->name. ' email: '.Auth()->user()->email;
        $descripcion = 'Editar rol';
        LogController::storeLog('POST','Actualizar','Rol',$quien,$descripcion);
        
        return back();
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
