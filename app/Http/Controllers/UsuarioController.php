<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Storage;

class UsuarioController extends Controller
{
    public function registrar(Request $request)
    {
        $nombre = $request['nombre'];
        if (!Usuario::where('nombre', $nombre)->exists()) {
            $usuario = new Usuario();
            $usuario->nombre = $request['nombre'];
            $usuario->contraseña = $request['contraseña'];
            $usuario->id_employee = $request['id_employee'];
            $usuario->save();
            return "Usuario Creado";
        }
        return "Error Usuario ya existe existe";
    }

    public function login(Request $request)
    {
        $nombre = $request->email;
        $contraseña = $request->password;
        if (Usuario::where('nombre', $nombre)->exists()) {
            if (Usuario::where('nombre', $nombre)->where('contraseña', $contraseña)->exists()){
                return "Loged In";
            }else{
                return "Contraseña Incorrecta";
            }
        } else {
            return "Usuario no existe";
        }
    }

    public function formEditPerfil($id){
        //funcion para retornar una plantilla con datos del usuario
        $usuario = user::find($id);
        $contador = count($usuario);
        if ($contador>0) {
            return view("formularios.formEditPerfil")->with("usuario",$usuario);
        }else
        {

        }

    }

    public function editar_usuario(Request $request)
    {

        $data=$request->all();
        $idUsuario=$data["id_usuario"];
        $usuario=User::find($idUsuario);
        $usuario->name  =  $data["nombres"];
        $usuario->email=$data["email"];
        
        $resul= $usuario->save();

        if($resul){            
            return view("mensajes.msj_correcto")->with("msj","Datos actualizados Correctamente");   
        }
        else
        {            
            return view("mensajes.msj_rechazado")->with("msj","hubo un error vuelva a intentarlo");  
        }
    }


//subir imagen de usuario
    public function subir_imagen_usuario(Request $request)
    {

        $id=$request->input('id_usuario_foto');
        $archivo = $request->file('archivo');
        $input  = array('image' => $archivo) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:900');
        $validacion = Validator::make($input,  $reglas);
        if ($validacion->fails())
        {
          return view("mensajes.msj_rechazado")->with("msj","El archivo no es una imagen valida");
        }
        else
        {

            $nombre_original=$archivo->getClientOriginalName();
            $extension=$archivo->getClientOriginalExtension();
            $nuevo_nombre="userimagen-".$id.".".$extension;
            $r1=Storage::disk('fotografias')->put($nuevo_nombre,  \File::get($archivo) );
            $rutadelaimagen="../storage/fotografias/".$nuevo_nombre;
        
            if ($r1){

                $usuario=User::find($id);
                $usuario->imagenurl=$rutadelaimagen;
                $r2=$usuario->save();
                return view("mensajes.msj_correcto")->with("msj","Imagen agregada correctamente");
            }
            else
            {
                
            }

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
