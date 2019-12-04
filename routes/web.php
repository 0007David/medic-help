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






