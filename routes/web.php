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

Route::resource('services','ServiceController');
Route::resource('groups','GroupController');

//CRUD EMPLEADO
Route::get('/empleados', 'EmployeeController@mostrarVista');
Route::post('empleado/store','EmployeeController@almacenarEmpleado');

// Route::get('/empleado/{id}/edit', 'EmployeeController@edit'); //formulario edit

Route::get('/nuevo','EmployeeController@create');




// CRUD PACIENTE
Route::get('/pacientes', 'PatientController@listarPacientes');
Route::get('/nuevoPaciente', 'PatientController@create');
Route::post('paciente/store','PatientController@alamcenarPaciente');