<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {

    return view('welcome');

});

Auth::routes();
Route::get('/test', 'TestController@index');
Route::get('/home', 'HomeController@index')->name('home');

//gestionar perfil
Route::get('formEditPerfil/{id}','UsuarioController@formEditPerfil');

Route::post('subir_imagen_usuario', 'UsuarioController@subir_imagen_usuario');
Route::post('editar_usuario', 'UsuarioController@editar_usuario');
Route::get('f_cambiar_password','UsuarioController@cambiar_password');

//gestionar archivos
Route::get('mostrarFormVista/{id}','DocumentController@vistaAddDocumento');
Route::post('subir_archivo_usuario', 'DocumentController@agregarDocumento');
Route::get('borrar_Documento/{id}','DocumentController@borrar_Documentos');
Route::get('descargar_Documento/{id}','DocumentController@descargarDocumento');

//gestionar archivos em grupo
Route::get('mostrarFormDocGrupo/{id}','GroupController@formGrupoDoc');
Route::post('subir_archivo_grupo', 'GroupController@agregarDocumento_Grupo');

//Dropbox
//Route::get('/', 'FileController@index')->name('files.index');
//Route::post('/files', 'FileController@store')->name('files.store');
Route::post('/files', 'FileController@store')->name('files.store');
Route::delete('/files/{file}', 'FileController@destroy')->name('files.destroy');
Route::get('/files/{file}/download', 'FileController@download')->name('files.download');

// BEGIN RUTAS ESPECIALIDAD
Route::get('/especialidad', 'EspecialidadController@mostrarVista');
Route::post('submit','EspecialidadController@store');

Route::get('/{id}/editarEspecialidad', 'EspecialidadController@update');
Route::post('/especialidad/{id}/edit', 'EspecialidadController@modificar');
Route::get('/{id}/eliminarEspecialidad', 'EspecialidadController@destroy');
Route::get('/{id}/activarEspecialidad', 'EspecialidadController@activar');
// END RUTAS ESPECIALIDAD


// Route::group(['prefix'=>'services'], function (){
//   Route::get('/create','ServiceController@create');
// });

//CRUD EMPLEADO
Route::get('/empleados', 'EmployeeController@mostrarVista');
Route::get('/empleado','EmployeeController@create'); // formulario save
Route::post('empleado/store','EmployeeController@almacenarEmpleado');

Route::get('/empleado/{id}/edit', 'EmployeeController@edit'); //formulario edit
Route::post('empleado/{id}/update','EmployeeController@update');

// CRUD PACIENTE
Route::get('/pacientes', 'PatientController@listarPacientes');
Route::get('/paciente', 'PatientController@create');
Route::post('paciente/store','PatientController@alamcenarPaciente');
Route::get('/paciente/{id}/edit','PatientController@edit');
Route::post('/paciente/{id}/update','PatientController@update');

// CRUD ROLES
Route::get('/roles', 'RolController@index');
Route::post('roles/store', 'RolController@store');
Route::post('/ajaxSolicitud', 'RolController@show');
Route::post('roles/edit', 'RolController@edit');
Route::get('roles/{id}/permisos', 'RolController@getFormRoles');
Route::post('/roles/permisos/store', 'RolController@storePermiso');

// TEMAS
Route::get('/temas', 'TemaController@index');
Route::post('/temas/store', 'TemaController@store');
Route::get('/fetchTema', 'TemaController@show');

// REPORTES
Route::get('/reportes','TestController@indexReporte');

//PARTE DE DANIEL
Route::resource('services','ServiceController');
// Route::resource('groups','GroupController');
Route::get('/groups', 'GroupController@index'); //listar grupos 
Route::get('/groups/create', 'GroupController@create');
Route::post('/groups/store', 'GroupController@store');
Route::get('/groups/{id}','GroupController@show');
Route::get('/groups/{id}/edit','GroupController@edit');
Route::put('/groups/{id}/update','GroupController@update');

Route::get('groups/{id}/listMember','GroupController@addMember');
Route::post('/addMember','GroupController@addNewMember');
Route::get('/listaPermisosGrupo/{id}','GroupController@showListaPermisos');
Route::post('/editarPermisos','GroupController@editarPermisos');
Route::post('/groups/{id}/','GroupController@prueba');

//Comentarios
Route::get('/comentarios','ComentarioController@index');
Route::get('/comentarios/{idDocument}/{idGrupo}','ComentarioController@getCommentsByDocument');
Route::post('/comentarios/group/{id_group}/document/{id_documento}','ComentarioController@store');

// Route::get('/backup',['as'=> 'backup','uses'=>'BackupController@index']);
// Route::get('backup/create', ['as' => 'createBackup','uses'=>'BackupController@create']);
// Route::get('backup/download/{file_name}',['as'=> 'backupDownload','uses'=>'BackupController@download']);
// Route::get('backup/delete/{file_name}',['as'=>'backupDelete','uses'=>'BackupController@delete']);




