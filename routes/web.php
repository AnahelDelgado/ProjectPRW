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

Route::get('/login', function () {
    return view('login.login');
})->name('login');
// link para la reserva de solo el material sin el aula
Route::get('/reservaPrueba', 'App\Http\Controllers\reservasController@reservaPrueba')->name('secciones.reservaPrueba');

// link para la reserva del aula y el material
Route::get('/reservaAulayMaterial', 'App\Http\Controllers\EventController@reserva3')->name('secciones.reserva3');

// link para la elección del tipo de reserva
Route::get('/eleccion', 'App\Http\Controllers\EventController@eleccionreserva')->name('login.eleccion');

// link para mis reservas
Route::get('/misReservas', 'App\Http\Controllers\EventController@misReservas')->name('secciones.misResevas');

// Ruta para mostrar el formulario de edición de reservas
Route::get('/reservas/editarAula', [EventController::class, 'mostrarFormularioEditarReserva'])->name('reservas.editar');

// Ruta para procesar la edición de la reserva
Route::post('/reservas/editarAula', [EventController::class, 'editarReserva'])->name('reservas.editar');

// Ruta para editar el material
Route::get('/reservas/editarmaterial', 'App\Http\Controllers\EventController@editarMaterial')->name('secciones.editarMaterial');

// Ruta para eliminar una reserva
Route::get('/reservas/eliminar', 'App\Http\Controllers\EventController@mostrarReservas')->name('reservas.eliminar');
Route::delete('/reservas/eliminar', 'App\Http\Controllers\EventController@eliminarReserva')->name('reservas.eliminar');

// Ruta para eliminar material
Route::get('/reservas/eliminarMaterial', 'App\Http\Controllers\EventController@eliminarMaterial')->name('reservas.eliminarMaterial');

// Rutas para la API de Google.
Route::get('/auth/google','App\Http\Controllers\googleAPIController@redirectToGoogle');
Route::get('/auth/google/callback', 'App\Http\Controllers\googleAPIController@handleGoogleCallback');
Route::post('/logout', 'App\Http\Controllers\googleAPIController@logout');

// Ruta para mostrar el formulario de reserva
Route::get('/reservaAula', [EventController::class, 'añadir'])->name('reservas.añadir');

Route::get('reservarAula/{fecha}', 'App\Http\Controllers\EventController@horasDisponibles');
Route::get('reservarAula/{fecha}/{aula}', 'App\Http\Controllers\EventController@horafecha');
Route::post('reservarAula/add', 'App\Http\Controllers\EventController@store')->name("reserve.add");

// Rutas para la reserva de material
Route::get('reservaMaterial', 'App\Http\Controllers\EventController@reservaMaterial');
Route::get('reservarMaterial/{fecha}/{hora_inicio}/{hora_fin}', 'App\Http\Controllers\EventController@materialDisponible')->name('secciones.dispositivos');