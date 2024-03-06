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
Route::get('/reservaAula', 'App\Http\Controllers\reservasController@reserva1')->name('secciones.reserva');
Route::get('/reservaMaterial', 'App\Http\Controllers\reservasController@reserva2')->name('secciones.reserva2');
Route::get('/eleccion', 'App\Http\Controllers\reservasController@eleccionreserva')->name('secciones.eleccion');