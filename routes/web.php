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

Route::get('/especialidad','EspecialidadController@index2');

// Route::group(['prefix'=>'services'], function (){
//   Route::get('/create','ServiceController@create');
// });

Route::resource('services','ServiceController');
Route::resource('groups','GroupController');

//CRUD EMPLEADO
Route::get('/empleados', 'EmployeeController@mostrarVista');
Route::post('empleado/store','EmployeeController@almacenarEmpleado');
Route::get('/empleado/{id}/edit', 'EmployeeController@edit'); //formulario edit
Route::get('/nuevo','EmployeeController@create');

// CRUD PACIENTE
Route::get('/pacientes', 'PatientController@listarPacientes');
Route::get('/nuevoPaciente', 'PatientController@create');
Route::post('paciente/store','PatientController@alamcenarPaciente');

// CRUD ROLES
Route::get('/roles', 'RolController@index');
Route::post('roles/store', 'RolController@store');
Route::post('/ajaxSolicitud', 'RolController@show');
Route::post('roles/edit', 'RolController@edit');
Route::get('roles/{id}/permisos', 'RolController@getFormRoles');
Route::post('/roles/permisos/store', 'RolController@storePermiso');

// TEMAS
Route::get('/temas', 'TemaController@index');




