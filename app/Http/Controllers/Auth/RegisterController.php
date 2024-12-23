<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi data input
        $this->validator($request->all())->validate();

        // Event setelah user terdaftar
        event(new Registered($this->create($request->all())));

        // Arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Menangani pengalihan setelah registrasi
    protected function registered(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.index');
        }

        return redirect()->route('user.index');
    }

    // Validator data registrasi
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

     // Membuat user baru
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user', // Default role
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    // Path untuk redirect setelah login
    // public function redirectPath()
    // {
    //     return '/dashboard';
    // }

}

