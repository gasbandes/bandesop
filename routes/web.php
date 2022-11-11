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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resultado', [App\Http\Controllers\HomeController::class, 'grafico'])->name('resultado.index');
Route::get('/historial', [App\Http\Controllers\HomeController::class, 'historial'])->name('historial.index');
Route::post('/verificacion/personal', [\Modules\Personal\Http\Controllers\PersonalController::class, 'buscar'])->name('personal.buscar');

//Route Hooks - Do not delete//
	Route::view('operativos', 'livewire.operativos.index')->middleware('auth');
	Route::view('productos', 'livewire.productos.index')->middleware('auth');
	Route::view('personals', 'livewire.personals.index')->middleware('auth');
	Route::view('gerencias', 'livewire.gerencias.index')->middleware('auth');
