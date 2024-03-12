<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\teacher;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;

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

Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('secciones.index');
// Route::get('/mostrar', [App\Http\Controllers\EventController::class, 'show']);

Route::get('/login', 'App\Http\Controllers\menuController@showLogin')->name('login.login');

Route::get('/grid', 'App\Http\Controllers\menuController@showgrid')->name('secciones.grid');



// Ruta para mostrar el formulario de reserva
Route::get('/reservaAula', [EventController::class, 'añadir'])->name('reservas.añadir');

// Ruta para almacenar la reserva (solicitud POST desde el formulario)
Route::post('/reservaAula', [EventController::class, 'store'])->name('reservas.store');

// link para la reserva de solo el material sin el aula


//link de prueba para la reserva de solo el material sin el aula
Route::get('/reservaPrueba', 'App\Http\Controllers\reservasController@reservaPrueba')->name('secciones.reservaPrueba');

// link para la reserva del aula y el material

Route::get('/reservaAulayMaterial', 'App\Http\Controllers\EventController@reserva3')->name('secciones.reserva3');

// link para la elección del tipo de reserva

Route::get('/eleccion', 'App\Http\Controllers\EventController@eleccionreserva')->name('login.eleccion');

// link para mis reservas

Route::get('/misReservas', 'App\Http\Controllers\EventController@misReservas')->name('secciones.misResevas');



//Editar aula y material
Route::get('/reservas/editarAula', 'App\Http\Controllers\EventController@editar')->name('reservas.editar');

Route::get('/reservas/editarmaterial', 'App\Http\Controllers\EventController@editarMaterial')->name('secciones.editarMaterial');

//Eliminar aula y material

Route::get('/reservas/eliminar', 'App\Http\Controllers\EventController@eliminar')->name('reservas.eliminar');

Route::get('/reservas/eliminarMaterial', 'App\Http\Controllers\EventController@eliminarMaterial')->name('reservas.eliminarMaterial');


//eleccion de editar y eliminar

Route::get('/reservas/editar/eleccioneliminar', 'App\Http\Controllers\EventController@eleccioneliminar')->name('reservas.eleccioneliminar');

Route::get('/reservas/editar/eleccioneditar', 'App\Http\Controllers\EventController@eleccioneditar')->name('reservas.eleccioneditar');






//Rutas para la API de Google.

Route::get('/auth/google','App\Http\Controllers\googleAPIController@redirectToGoogle');

Route::get('/auth/google/callback', 'App\Http\Controllers\googleAPIController@handleGoogleCallback');

Route::post('/logout', 'App\Http\Controllers\googleAPIController@logout');




//Calendario

Route::get('/events',[App\Http\Controllers\reservasController::class, 'getEvents']);




//Consultas para la reserva de aulas

Route::get('reservarAula/{fecha}', 'App\Http\Controllers\EventController@horasDisponibles');

Route::get('reservarAula/{fecha}/{aula}', 'App\Http\Controllers\EventController@horafecha');

Route::post('reservarAula/add', 'App\Http\Controllers\EventController@store')->name("reserve.add");

//Consutas para la reserva de material

Route::get('reservaMaterial', 'App\Http\Controllers\EventController@reservaMaterial')->name('reservas.material');

Route::get('reservarMaterial/{fecha}', 'App\Http\Controllers\EventController@materialDisponible')->name('secciones.reserva2');
