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
//CRUD EMPLEADO
Route::get('/empleados', 'EmployeeController@mostrarVista');
Route::post('empleado/store','EmployeeController@almacenarEmpleado');
Route::get('/empleado/{id}/edit', 'EmployeeController@edit'); //formulario edit
Route::get('/nuevo','EmployeeController@create');




// CRUD PACIENTE
Route::get('/pacientes', 'PatientController@listarPacientes');
Route::get('/nuevoPaciente', 'PatientController@create');
Route::post('paciente/store','PatientController@alamcenarPaciente');


