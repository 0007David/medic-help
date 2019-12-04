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

Route::post('registrar','UsuarioController@registrar');
Route::post('login','UsuarioController@login');

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

//BEGIN RUTAS API ESPECIALIDAD
Route::get('Especialidad/list', 'Api\EspecialidadApiController@list');
Route::get('Especialidad/list/{id}', 'Api\EspecialidadApiController@getEspecialidad');
Route::post('Especialidad/insert', 'Api\EspecialidadApiController@insert');
Route::put('Especialidad/update/{id}', 'Api\EspecialidadApiController@update');
Route::post('Especialidad/delete/{id}', 'Api\EspecialidadApiController@delete');
//END RUTAS API ESPECIALIDAD

