<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Storage;
use App\Person;
use App\Patient;
use App\Employee;
use App\Document;
use App\servicio;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Spatie\Dropbox\Client;
use App\Http\Controllers\FileController;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();
    }

    public function vistaAddDocumento( $id )
    //devolver formulario de agregar documento 
    {

    	$usuario=User::find($id);
    	$user_id=$usuario->id;
    	$persona=Person::find($user_id);
        $empleado=Employee::find($user_id);
        $documentos = Document::all();
    	$pacientes = Patient::all();
        $servicios = servicio::all();
        $rutaarchivos= "../storage/archivos/";
    	return view("formularios.formVistaDocumento")
    	->with("usuario",$usuario)
    	->with("persona",$persona)
    	->with("pacientes",$pacientes)
        ->with("empleado",$empleado)
        ->with("documentos",$documentos)
        ->with("rutaarchivos",$rutaarchivos)
        ->with("servicios",$servicios);

    }


    public function agregarDocumentoGrupo($archivo,$id)
    {       
        //agregando a local

        $ruta=$id."/".$id."_".$archivo->getClientOriginalName();
        $r1=Storage::disk('archivos')->put($ruta,  \File::get($archivo) );

        //agregando a dropbox
        $url_global = (new FileController)->generar_url($archivo);

        $resultado = array('ruta_local' =>$ruta ,'ruta_global'=>$url_global, );
        return $resultado;

    }
    public function agregarDocumento( Request $request) 
    {

        
        $archivo = $request->file('file');
        //subiendo el archivo a drobox
        $url_global = (new FileController)->generar_url($archivo);
      	$input = array('file' => $archivo);
      	$reglas = array('file' =>'required|max:50000');
        $validacion = Validator::make($input, $reglas);

        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es un pdf o es demasiado Grande para subirlo por favorcito");
        }
        else
        {
        	
            $documento = new Document;
            $documento->descripcion=$request->input("descripcion");          
            $documento->estado="activado";
            $documento->fecha_creacion="2019-11-05";
            $documento->observaciones=$request->input("observacion");
            $documento->id_patient=$request->input("paciente");
            $documento->id_service=$request->input("servicio");
        
            $documento->id_employee=$request->input("empleado");
        
            $carpeta = $request->input("id_usuario");
            $ruta=$carpeta."/".$request->input("id_usuario")."_".$archivo->getClientOriginalName();
            $r1=Storage::disk('archivos')->put($ruta,  \File::get($archivo) );

            $documento->url_archivo=$ruta;
            $documento->url_archivo_global=$url_global;
            $resul= $documento->save();

           if($resul){            
             return view("mensajes.msj_correcto")->with("msj","Documento Agregada Correctamente"); 
              
            }
            else
            {            
               return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
            }

			
        }
        
    }

    public function descargarDocumento($id)
    {
         $Documento=Document::find($id);
         
         $rutaarchivo= "../storage/archivos/".$Documento->url_archivo;
         return response()->download($rutaarchivo);
    }

    public function borrar_Documentos($id_doc)
    {
    	$documento=Document::find($id_doc);
        $resul=$documento->delete();
        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Borrado correctamente");   

        }
        else
        {            
             return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }
    }
    //pruebasss
    public function alldocuments()
    {
        return response()->json(Document::get(), 200);
    }

    public function documentById($id)
    {   
        $documento=Document::find($id);
        return response()->json($documento,200);
    }

    public function documentoSave()
    {
        $documento = Document::create($request->all());
        return response()->json($Document, 201);
    }
    public function prueba()
    {
        $Test = array("saludo" => "hola");
        $t = json_encode($Test);
        return response()->json($Test,200);
    }
 
}
