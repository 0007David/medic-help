<?php

namespace App\Http\Controllers;


use App\Document;
use App\DocumentGroup;
use App\Employee;
use App\Group;
use App\Http\Controllers\DocumentController;
use App\Patient;
use App\Person;
use App\User;
use App\servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


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
        $persona = DB::select('SELECT * FROM `people`WHERE people.user_id = :id',['id' => $usuario->id]);
        //obteniedo el dato de un stdClass
        //trunca#1 no podia obtener los datos desde persona ya que es un stdClass intente en la forma de json,array[][] :(
        $id_empleado = $persona[0]->peopleable_id;
        //Obteniendo todos los grupos al que peretnece el empelado
        $grups = GroupController::grupos_de_Empleado($id_empleado);
        foreach ($grups as $GR ) {
        // creando un array multiple para añadir nodos(grupo,documentos del grupo)
        $id_grupo = $GR->id;
        $g = DB::select('SELECT* FROM groups,document_groups, documents WHERE groups.id= document_groups.group_id AND documents.id=document_groups.document_id AND groups.id = :id',['id' => $id_grupo]);   
        $getd= array();
        $getd[] = $GR;
        $getd[] = $g;
        $Doc_grupos[] = $getd;
        }
    
        
        $empleado = Employee::find($id_empleado);
        $documentos = Document::all();
        $pacientes = Patient::all();
        $servicios = servicio::all();
        $rutaarchivos= "../storage/archivos/";

        //grupos en los que esta articipando el usuario
        $grupos = DB::select('SELECT groups.id, groups.nombre from groups,employees_groups,employees WHERE groups.id = employees_groups.id_group AND employees_groups.id_employee = employees.id AND employees.id = :id',['id'=>$id_empleado]);

     return view('formularios.formGrupoDoc')
        ->with('usuario',$usuario)
        ->with('grupos',$grupos)
        ->with("pacientes",$pacientes)
        ->with("empleado",$empleado)
        ->with("documentos",$documentos)
        ->with("rutaarchivos",$rutaarchivos)
        ->with("servicios",$servicios)
        ->with("DocumentosGrupos",$Doc_grupos)
        ->with("Doc_grupos",$Doc_grupos);
     }

    public function agregarDocumento_Grupo(Request $request)
    {   

        $archivo = $request->file('file');
        //validando
        $input = array('file' => $archivo);
        $reglas = array('file' =>'required|max:50000');
        $validacion = Validator::make($input, $reglas);

        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo!");
        }else{
        //save archivos
        $id = $request->input("id_usuario");
        $rutas = (new DocumentController)->agregarDocumentoGrupo($archivo,$id);
        $ruta_local = $rutas['ruta_local'];
        $ruta_global = $rutas['ruta_global'];

        //creando documento
        $documento = new Document;
        $documento->descripcion=$request->input("descripcion");          
        $documento->estado="activado";
        $documento->fecha_creacion=date("Y-m-d");// modificar obtener la fecha actual
        $documento->observaciones=$request->input("observacion");
        $documento->id_patient=$request->input("paciente");
        $documento->id_service=$request->input("servicio");
        $documento->id_employee=$request->input("empleado");
        $documento->url_archivo=$ruta_local;
        $documento->url_archivo_global=$ruta_global;;
        $resul= $documento->save();

        //creando relacion documento-grupo
        $id_documento = DB::select('SELECT documents.id FROM `documents` WHERE documents.id IN(SELECT MAX(documents.id) FROM documents)');
        $id_grupo =$request->input("grupo");
        $documento_grupo = new DocumentGroup;
        $documento_grupo->document_id = $id_documento[0]->id;
        $documento_grupo->group_id = $id_grupo;
        $resul = $documento_grupo->save();

        if($resul){            
             return view("mensajes.msj_correcto")->with("msj","Documento Agregada Correctamente"); 
        }else{            
           return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }

    }

    }
    public function grupos_de_Empleado($id_emplado)
    {   
        $grupos = DB::select('SELECT * FROM groups, employees_groups WHERE groups.id=employees_groups.id_group AND employees_groups.id_employee =:id',['id' => $id_emplado]);

        return $grupos;
         
    }
}
