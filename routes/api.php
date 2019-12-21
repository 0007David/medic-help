<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('xxx', 'TestController@create');
// Route::apiResource('tests', 'TestController');
Route::apiResource('patients', 'PatientController');
Route::apiResource('employees', 'EmployeeController');

Route::post('/login','Api\LoginController@login');

Route::post('registrar','UsuarioController@registrar');
// Route::post('login','UsuarioController@login');

Route::group(['prefix'=>'security'], function (){
    Route::get('index', 'SecurityController@index');
    Route::post('store', 'SecurityController@store');
    Route::post('show', 'SecurityController@show');
    Route::post('update', 'SecurityController@update');
    Route::post('destroy', 'SecurityController@destroy');
});
Route::group(['prefix'=>'Group'], function (){
    Route::get('index', 'GroupController@index');
    Route::post('store', 'GroupController@store');
    Route::post('show', 'GroupController@show');
    Route::post('update', 'GroupController@update');
    Route::post('destroy', 'GroupController@destroy');
});
Route::group(['prefix'=>'EmployeeGroup'], function (){
    Route::get('index', 'EmployeeGroupController@index');
    Route::post('store', 'EmployeeGroupController@store');
    Route::post('show', 'EmployeeGroupController@show');
    Route::post('update', 'EmployeeGroupController@update');
    Route::post('destroy', 'EmployeeGroupController@destroy');
});
Route::group(['prefix'=>'Especialidad'], function (){
    Route::get('index', 'EspecialidadController@index');
    Route::post('store', 'EspecialidadController@store');
    Route::post('show', 'EspecialidadController@show');
    Route::post('update', 'EspecialidadController@update');
    Route::post('destroy', 'EspecialidadController@destroy');
});


//gestionar documento
Route::apiResource('documento','Documento\Documento');


// API PARA REPORTES
Route::post('/reporte','Api\ReporteController@storeReporte');
// Route::post('/login','Api\LoginController@login');

//BEGIN RUTAS API ESPECIALIDAD
Route::get('Especialidad/list', 'Api\EspecialidadApiController@list');
Route::get('Especialidad/getEspecialidad', 'Api\EspecialidadApiController@getEspecialidad');
Route::post('Especialidad/insert', 'Api\EspecialidadApiController@insert');
Route::put('Especialidad/update', 'Api\EspecialidadApiController@update');
Route::put('Especialidad/delete', 'Api\EspecialidadApiController@delete');
Route::put('Especialidad/activar', 'Api\EspecialidadApiController@activar');
//END RUTAS API ESPECIALIDAD

//API GRUPOS
Route::get('/usuarioGrupos','Api\GrupoController@getGrupoDeUsuario');







//api que devuelva los documentos de un empleado y grupo
Route::get('gruposDeEmpleado','EmployeeGroupController@Grupos_de_Empleado');
//api que devuelve los datos persona de un id_usuario
Route::get('personaDeUsuario','UsuarioController@Persona_de_Usuario');
//devuelve los documentos de un grupo
Route::get('documentosGrupo','DocumentController@Documentos_de_un_Grupo');
//devuelve todos los documentos de un paciente
Route::get('documentosDePaciente','DocumentController@Documentos_de_un_Paciente');
//devuelve si un empleado es usuario es emplado o paciente
Route::get('isPacienteOrEmpleado','UsuarioController@es_Paciente_o_Empleado');
//devuelve integrantes de un grupo 
Route::get('integrantesGrupo','GroupController@integrantes_de_Grupo');


