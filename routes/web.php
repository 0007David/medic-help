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

