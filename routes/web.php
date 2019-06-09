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
Route::get('/blog', 'BlogController@index');
Route::get('/blog/tambah', 'BlogController@tambah');
Route::post('/blog/masuk', 'BlogController@masuk');
Route::get('/blog/edit/{id}','BlogController@edit');
Route::post('/blog/update', 'BlogController@update');
Route::get('/blog/hapus/{id}','BlogController@hapus');
Route::get('/blog/cari', 'BlogController@cari');