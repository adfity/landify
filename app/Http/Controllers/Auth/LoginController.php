<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override the authenticated method to redirect users
     * based on their role after login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Cek peran pengguna dan arahkan ke halaman yang sesuai

            if (auth()->user()->role == 'user') {
                return redirect()->route('user.index');
            } elseif (auth()->user()->role == 'admin') {

                return redirect()->route('admin.index');
            }
        }
    
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();  // Logout pengguna
        $request->session()->invalidate();  // Hapus sesi
        $request->session()->regenerateToken();  // Regenerasi token CSRF

        return redirect('/');  // Arahkan ke halaman utama atau halaman login
    }
    
}
