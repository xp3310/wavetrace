<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/home', 'AdminController@home');
Route::get('admin/show', 'AdminController@show');
Route::get('media/edit/{id}', 'MediaController@edit');
Route::post('media/upload/{id}', 'MediaController@upload');
Route::post('mediaItem/move', 'MediaItemController@move');
Route::post('mediaItem/delete/{id}', 'MediaItemController@delete');
