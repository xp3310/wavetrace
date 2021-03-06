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

Route::get('/', 'HomeController@home');

Route::group(['as' => 'admin.'], function(){

	Route::get('admin/', 	 'AdminController@home')->name('index');
	Route::get('admin/home', 'AdminController@home')->name('index');

	Route::resource('admin/room', 	 'Admin\RoomController');
    Route::resource('admin/product', 'Admin\ProductController');
	Route::resource('admin/sys_config', 'Admin\SysConfigController');
});




Route::resource('media', 'MediaController');
Route::resource('media_item', 'MediaItemController');

Route::post('media/upload/{id}', 'MediaController@upload');



Route::post('mediaItem/move', 'MediaItemController@move');









