<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::group(['prefix' => '/'], function () {
	Route::get('/','projectController@index')->name('pm.index');
	Route::get('/list','projectController@list')->name('pm.list');
	Route::get('/list/{id}','projectController@list_show')->name('pm.list_show');
	Route::get('/list/status/{id}','projectController@list_status')->name('pm.list_status');
	Route::post('/list/file/{id}','projectController@file_update')->name('pm.file_update');
});
