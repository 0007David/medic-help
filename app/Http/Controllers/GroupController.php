<?php

namespace App\Http\Controllers;


use App\Document;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
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
        $group->nombre=$request->input('nombre');
        $group->descripcion=$request->input('descripcion');
        $group->save();

        //Aqui falta encontrar al employee porque no hay base, por ahora voy a usar el id del user que esta loggeado, mas el grupo se relaciona con el 1ro. 
        $employee=Employee::find(auth()->user()->id);
        $group->employees()->attach((auth()->user()->id),['descargar'=>'true','eliminar'=>'true','lectura'=>'true', 'rolGrupo'=>'dueño']);
        return 'saved';
    }

    /**
     * Display the specified resource.
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

    public function formGrupoDoc( $id )
    {
        $usuario = User::find($id);
        $user_id=$usuario->id;
        $persona=Person::find($user_id);
        $empleado=Employee::find($user_id);
        $documentos = Document::all();
        $pacientes = Patient::all();
        $servicios = servicio::all();
        $rutaarchivos= "../storage/archivos/";

        //grupos en los que esta articipando el usuario
        $grupos = DB::select('SELECT groups.id,groups.nombre from groups, people, employees_groups WHERE people.id = employees_groups.id_employee AND employees_groups.id_group=groups.id   AND people.id = :id',['id'=>$id]);


        return view('formularios.formGrupoDoc')
        ->with('usuario',$usuario)
        ->with('grupos',$grupos)
        ->with("persona",$persona)
        ->with("pacientes",$pacientes)
        ->with("empleado",$empleado)
        ->with("documentos",$documentos)
        ->with("rutaarchivos",$rutaarchivos)
        ->with("servicios",$servicios);
    }

    public function agregarDocumento_Grupo(Request $request)
    {   
        $archivo = $request->file('file');
        $id = $request->input("id_usuario");
        $rutas = (new DocumentController)->agregarDocumentoGrupo($archivo,$id);
        $ruta_local = $rutas['ruta_local'];
        $ruta_global = $rutas['ruta_global'];


        $documento = new Document;
        $documento->descripcion=$request->input("descripcion");          
        $documento->estado="activado";
        $documento->fecha_creacion="2019-11-05";// modificar obtener la fecha actual
        $documento->observaciones=$request->input("observacion");
        $documento->id_patient=$request->input("paciente");
        $documento->id_service=$request->input("servicio");
    
        $documento->id_employee=$request->input("empleado");
        $documento->url_archivo=$ruta_local;
        $documento->url_archivo_global=$ruta_global;;
        $resul= $documento->save();

        $id_grupo =$request->input("grupo");
        //falta completar
        //hago una consulta para obtener el ultimo documento creado por empleado y lo guardo en grupo-documento
    }
}
