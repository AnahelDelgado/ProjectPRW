<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', 'App\Http\Controllers\menuController@showLogin')->name('secciones.login');
Route::get('/ReservaAula', 'App\Http\Controllers\reservasController@reserva1')->name('secciones.layout');
Route::get('/ReservaMaterial', 'App\Http\Controllers\reservasController@reserva2')->name('secciones.layout');
