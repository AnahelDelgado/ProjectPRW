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



Route::get('/login', 'App\Http\Controllers\menuController@showLogin')->name('secciones.login');

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

