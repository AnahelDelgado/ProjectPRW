<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\teacher;
use Illuminate\Support\Facades\Auth;


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

// link para el menú principal 

Route::get('/', 'App\Http\Controllers\reservasController@index')->name('secciones.horario');

Route::get('/login', 'App\Http\Controllers\menuController@showLogin')->name('login.login');

Route::get('/grid', 'App\Http\Controllers\menuController@showgrid')->name('secciones.grid');


// link para la reserva del aula sin material

Route::get('/reservaAula', 'App\Http\Controllers\reservasController@añadir')->name('reservas.añadir');

// link para la reserva de solo el material sin el aula

Route::get('/reservaMaterial', 'App\Http\Controllers\reservasController@reserva2')->name('secciones.reserva2');

// link para la reserva del aula y el material

Route::get('/reservaAulayMaterial', 'App\Http\Controllers\reservasController@reserva3')->name('secciones.reserva3');

// link para la elección del tipo de reserva

Route::get('/eleccion', 'App\Http\Controllers\reservasController@eleccionreserva')->name('login.eleccion');

// link para mis reservas

Route::get('/misReservas', 'App\Http\Controllers\reservasController@misReservas')->name('secciones.misResevas');



//Editar aula y material
Route::get('/reservas/editarAula', 'App\Http\Controllers\reservasController@editar')->name('reservas.editar');

Route::get('/reservas/editarmaterial', 'App\Http\Controllers\reservasController@editarMaterial')->name('secciones.editarMaterial');

//Eliminar aula y material

Route::get('/reservas/eliminar', 'App\Http\Controllers\reservasController@eliminar')->name('reservas.eliminar');

Route::get('/reservas/eliminarMaterial', 'App\Http\Controllers\reservasController@eliminarMaterial')->name('reservas.eliminarMaterial');


//eleccion de editar y eliminar

Route::get('/reservas/editar/eleccioneliminar', 'App\Http\Controllers\reservasController@eleccioneliminar')->name('reservas.eleccioneliminar');

Route::get('/reservas/editar/eleccioneditar', 'App\Http\Controllers\reservasController@eleccioneditar')->name('reservas.eleccioneditar');






//Rutas para la API de Google.

Route::get('/auth/google','App\Http\Controllers\googleAPIController@redirectToGoogle');

Route::get('/auth/google/callback', 'App\Http\Controllers\googleAPIController@handleGoogleCallback');

Route::post('/logout', 'App\Http\Controllers\googleAPIController@logout');




//Calendario

Route::get('/events',[App\Http\Controllers\reservasController::class, 'getEvents']);

