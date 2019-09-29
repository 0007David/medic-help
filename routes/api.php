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



