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

$users = DB::table('people')
            ->join('employees', 'employees.id', '=', 'people.peopleable_id')
            ->get();
echo '<pre>'; print_r($users); echo '</pre>';
    return view('welcome');
});

Route::get('/test', 'TestController@index');