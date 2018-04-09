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