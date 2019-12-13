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

    public function formEditPerfil(){
        //funcion para retornar una plantilla con datos del usuario
        $id = Auth()->user()->id;
        $usuario = user::find((int)$id);
        // dd($usuario);
        $persona = $usuario->person;
        // $contador = count($usuario);
        // if ($contador>0) {
            // return view("formularios.formEditPerfil")
            // ->with("usuario",$usuario)
            // ->with("persona",$persona);
        $returnHTML = view("formularios.formEditPerfil")
        ->with("usuario",$usuario)
        ->with("persona",$persona);
        // echo "<script>console.log('Debug Objects: " . $id . "' );</script>";
        // $returnHTML = view('job.userjobs')->with('userjobs', $userjobs)->render();
        return response()->json(array('success' => true, 'html'=>´

        <div class="row">  
        
          <div class="col-md-6">
        
                <div class="box box-primary">
                                
                                <div class="box-header">
                                  <h3 class="box-title">Editar información del Usuario</h3>
                                </div><!-- /.box-header -->
        
                <div id="notificacion_resul_feu"></div>
                <?php
                
               // print_r($persona);
            
                ?>
        
        
                <form  id="f_editar_usuario"  method="post"  action="editar_usuario" class="form-horizontal form_entrada" >                
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                  <input type="hidden" name="id_usuario" value="<?= $usuario->id; ?>">              
        
        
                <div class="box-body ">
                <div class="form-group col-xs-12">
                                      <label for="nombre">Nombre: </label>
                                      <input type="text" class="form-control" id="nombres" name="nombres"  value="<?= $usuario->name; ?>"  >
                </div>
        
                <div class="form-group col-xs-12">
                                      <label for="apellido">Apellido:</label>
                                      <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $persona->apellido?>"  >
                </div>
                <div class="form-group col-xs-12">
                                      <label for="telefono">Telefono</label>
                                      <input type="text" class="form-control" id="telefono" name="telefono"  value="<?=$persona->telefono?>" >
                </div>
                <div class="form-group col-xs-12">
                    <?php
                    $sex='';
                        if ($persona->sexo == 'M' or $persona->sexo == 'm') {
                            $sex = "Masculino";
                        }elseif ($persona->sexo == 'F' or $persona->sexo =='f') {
                            $sex = "Femenino";
                        }elseif ($persona->sexo !='') {
                            $sex ="Otros";
                        # code...
                        }
                            
                    ?>
                                      <label for="sexo">Sexo</label>
                                      <input type="text" class="form-control" id="sexo" name="sexo" value="<?=$sex?>" >
                </div>
                <div class="form-group col-xs-12">
                                      <label for="email">Email</label>
                                      <input type="text" class="form-control" id="email" name="email"   value="<?= $usuario->email; ?>" >
                </div>
                        <div class="form-group col-xs-12">
                                      <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                      <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"   value="<?= $persona->fecha_nacimiento; ?>" >
                </div>
        
        
        
                </div>
        
        
        
                <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                </div>
                </form>
                </div>
        
          </div> 
        
        <!--  bloque de la 2da columna-->
            <div class="col-md-6">
              <div class="box box-primary">
                    <div class="box-header">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Cambiar Imagen de Perfil</h3>
                        </div>
        
                        <div id="notificacion_resul_fci"></div>
        
                        <form id="f_subir_imagen" name="f_subir_imagen" method="post" action="subir_imagen_usuario" class="formarchivo" enctype="multipart/form-data">
                            <input type="hidden" name="id_usuario_foto" value="<?= $usuario->id?>">
                            <input type="hidden" name="_token" id="_token" value="<?= csrf_token(); ?>">
                                
        
                            <div class="form-group col-xs-12" >
                              <?php if($usuario->imagenurl==""){ $usuario->imagenurl="imagenes/avatar.jpg"; }  ?>
                              <img src="<?=  $usuario->imagenurl;  ?>"  alt="User Image"  style="width:160px;height:160px;" id="fotografia_usuario" >
                            </div>
        
                            <div class="form-group col-xs-12"  >
                                <label>Agregar Imagen </label>
                                <input name="archivo" id="archivo" type="file"   class="archivo form-control"  required/><br /><br />
                            </div>
        
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
                            </div>
                        </form>
                    </div>
               </div>
            <div class="col-md-6">
                <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cambiar Password</h3>
                        </div><!-- /.box-header -->
        
                        <div id="notificacion_resul_fcp"></div>
                        <!-- formulario -->
                        <form method="post" id="f_cambiar_password" class="form_entrada" action="cambiar_password" >
                            <!-- verificaciones de seguridad-->
                            <input type="hidden" name="id_usuario_password" value="<?= $usuario->id; ?>"> 
                            <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 
                            
                            <div class="box-body">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email </label>
                                  <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Entrar email" readonly="readonly" value="<?= $usuario->email; ?>" >
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control" id="password_usuario" name="password_usuario" placeholder="Password">
                                </div>
                            </div><!-- /.box-body -->
        
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cambiar Datos</button>
                            </div>
                        </form>
                </div>
          </div>    
        </div> 
        </div>
        <!-- fin de la segunda columna-->
        
        ´));
            // return response()->json($HTML);
        // }else
        // {

        // }

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
