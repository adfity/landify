<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Override the method to redirect users based on their role after resetting password.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Cek role pengguna dan arahkan ke rute yang sesuai
        if (Auth::user()->role == 'user') {
            return route('user.index');  // Arahkan ke dashboard user
        } elseif (Auth::user()->role == 'admin') {
            return route('dashboard.admin'); // Arahkan ke dashboard admin
        }

        // Default redirect jika role tidak ditemukan
        return '/login';  // Atau arahkan ke halaman lain jika perlu
    }

}
