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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tratamiento',\App\Http\Controllers\TratamientoController::class)->middleware('auth');
Route::resource('paciente',\App\Http\Controllers\PacienteController::class)->middleware('auth');
Route::resource('medico',\App\Http\Controllers\MedicoController::class)->middleware('auth');