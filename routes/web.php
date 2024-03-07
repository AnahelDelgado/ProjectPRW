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

Route::get('/', 'App\Http\Controllers\menuController@showhorario')->name('secciones.horario');

Route::get('/login', 'App\Http\Controllers\menuController@showLogin')->name('login.login');

// link para la reserva del aula sin material

Route::get('/reservaAula', 'App\Http\Controllers\reservasController@añadir')->name('reservas.añadir');

// link para la reserva de solo el material sin el aula

Route::get('/reservaMaterial', 'App\Http\Controllers\reservasController@reserva2')->name('secciones.reserva2');

// link para la reserva del aula y el material

Route::get('/reservaAulayMaterial', 'App\Http\Controllers\reservasController@reserva3')->name('secciones.reserva3');

// link para la elección del tipo de reserva

Route::get('/eleccion', 'App\Http\Controllers\reservasController@eleccionreserva')->name('secciones.eleccion');

// link para mis reservas

Route::get('/misReservas', 'App\Http\Controllers\reservasController@misReservas')->name('secciones.misResevas');



//Rutas para la API de Google.
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();

    $userExist = teacher::where('email', $user->email)->first();

    if($userExist){
        Auth::login($userExist);
    }else {
        $userNew = teacher::create([
            'nombre' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => (string) $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($userNew);
    }

    return redirect('/login');
});
