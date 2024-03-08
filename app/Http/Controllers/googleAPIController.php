<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\teacher;
use Illuminate\Support\Facades\Auth;

class GoogleAPIController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $userExist = teacher::where('email', $user->email)->first();

        if ($user) {
            Auth::login($userExist, true);
            session()->save();
        } else {
            $user = teacher::create([
                'nombre' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'external_id' => (string) $user->id,
                'external_auth' => 'google',
            ]);
            Auth::login($user, true);
            session()->save();
        }

        $viewData = [
            'avatar' => $user->avatar,
            'nombre' => $user->name,
        ];

        session()->put('user', $user->email);
        session()->put('viewData', $viewData);


        return redirect('/');
    }

    public function logout()
    {
        // Cerrar la sesión del usuario
        Auth::logout();

        // Eliminar los datos de la sesión
        session()->flush();

        // Redirigir al usuario a la página de inicio
        return redirect('/login');
    }
}
