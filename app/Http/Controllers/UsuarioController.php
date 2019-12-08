<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $persona = Person::find($id);
        $contador = count($usuario);
        if ($contador>0) {
            return view("formularios.formEditPerfil")
            ->with("usuario",$usuario)
            ->with("persona",$persona);
        }else
        {

        }

    }

    public function editar_usuario(Request $request)
    {
        $sex = '';
        $data=$request->all();
        $idUsuario=$data["id_usuario"];
        $usuario=User::find($idUsuario);
        $persona=Person::find($idUsuario);
        $usuario->name  =  $data["nombres"];
        $usuario->email=$data["email"];
        $persona->apellido=$data["apellido"];
        $persona->telefono=$data["telefono"];
        $persona->fecha_nacimiento=$data["fecha_nacimiento"];
        if ($data["sexo"]=="Masculino" or $data["sexo"]=="masculino") {
            $sex = 'M';
        }elseif ($data["sexo"]=="Femenino" or $data["sexo"]=="femenino" ) {
            $sex = 'F';
        }elseif (  $data["sexo"]!='') {
            $sex = 'O';
        }
        $persona->sexo=$sex;
        $res= $persona->save();
        $resul= $usuario->save();

        if($resul and $res){            
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

    public function f_cambiar_password(Request $request)
    {
        $id=$request->input("id_usuario_password");
        $email=$request->input("email_usuario");
        $password=$request->input("password_usuario");
        $usuario=User::find($id);
        $usuario->email=$email;
        $usuario->password=bcrypt($password);
        $r=$usuario->save();

        if($r){
           return view("mensajes.msj_correcto")->with("msj","password actualizado");
        }
        else
        {
            return view("mensajes.msj_rechazado")->with("msj","Error al actualizar el password");
        }
    }

}
