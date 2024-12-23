<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Socialite;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('default_password') // Anda dapat menggunakan password default
            ]
        );

        Auth::login($user);

        return redirect()->route('user.index');
    }
}
