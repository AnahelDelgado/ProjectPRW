<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\teacher;
use Illuminate\Contracts\Session\Session;
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

        if ($userExist) {
            Auth::login($userExist);
        } else {
            $userNew = teacher::create([
                'nombre' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'external_id' => (string) $user->id,
                'external_auth' => 'google',
            ]);
            Auth::login($userNew);
        }

        $viewData = [
            'avatar' => $user->avatar,
            'nombre' => $user->name,
        ];

        session()->put('user', $user->email);
        session()->put('viewData', $viewData);

        return redirect('/');
    }
}
