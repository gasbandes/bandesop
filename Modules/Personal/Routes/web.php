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

Route::group(['middleware' => 'actived','auth','verified'], function () {
    Route::resource('/personal', 'PersonalController');
    Route::post('/personal/buscar', 'PersonalController@buscar')->name('personal.buscar');
    Route::get('/personal/{personal_id}/datos', 'PersonalController@datos')->name('personal.datos');
    Route::get('/reversar/personal', 'PersonalController@reversar')->name('reversar.personal');
    Route::post('/personal/importar', 'PersonalController@importar')->name('personal.importar');
    Route::get('/personal/{personal_id}/productos', 'PersonalController@productos')->name('personal.productos');

});;
