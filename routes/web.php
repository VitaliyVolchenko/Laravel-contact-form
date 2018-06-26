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

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@store')->name('mes.store');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => '/admin'], function() {    
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/{id}', 'AdminController@getMessage')->name('mes.show')->where('id', '[0-9]+');
    Route::post('/', 'AdminController@MarkAnswered')->name('mark');
});

