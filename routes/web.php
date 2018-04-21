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

Route::post('/post-data-inventory', 'inventoryController@store')->name('post.invnty');

Route::get('/get-inventory/{id}', 'inventoryController@getInventoryById')->name('get.asset');

Route::post('/post-update-inventory', 'inventoryController@update')->name('update.invnty');

Route::get('/delet-inventory/{id}','inventoryController@delet')->name('delet.inventory');

Route::get('/home/{id}', 'inventoryController@afterD')->name('home.mesage');

Route::get('/get-data-table', 'HomeController@dataTable')->name('data.table');

Route::get('/data-table', 'DatatablesController@anyData')->name('table');

Route::get('/data-table-loc', 'DatatablesController@anyLocation')->name('tableLocation');

Route::get('/data-table-user', 'DatatablesController@anyUser')->name('tableUser');

Route::get('/get-location', 'LocationController@index')->name('get.location');

Route::post('/post-location', 'LocationController@store')->name('post.location');

Route::post('/update-location', 'LocationController@update')->name('update.location');

Route::get('/delet-location/{id}','LocationController@delet')->name('delet.location');

Route::get('/get-location-name', 'LocationController@getName')->name('location.name');

Route::get('/get-role', 'UsersController@getRole')->name('role');

Route::post('/set-role', 'UsersController@setRole')->name('setRole');

Route::get('/delet-role/{id}','UsersController@destroy')->name('delet.user');


Route::get('/posts', 'PostsController@index');

Route::post('/result', 'ResultController@show')->name('result');

Route::get('/newpost', 'HomeController@newpost')->name('newpost');

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/image-upload','ImageUploadController@imageUpload')->name('image.upload');

Route::post('/image-upload','ImageUploadController@imageUploadPost')->name('image.upload.post');

Route::post('/data-upload','ResultController@saveData')->name('data.upload.post');

Route::post('/data-saved','ResultController@saveDB')->name('data.post.save');

Route::post('/post/edit','ResultController@edit')->name('edit.post');

Route::get('user/create', 'HomeController@create');

Route::post('user/create', 'HomeController@store');