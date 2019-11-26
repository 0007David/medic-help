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
	return view('welcome');});

Auth::routes();
Route::get('/test', 'TestController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('formEditPerfil/{id}','UsuarioController@formEditPerfil');

Route::post('subir_imagen_usuario', 'UsuarioController@subir_imagen_usuario');

Route::post('editar_usuario', 'UsuarioController@editar_usuario');





