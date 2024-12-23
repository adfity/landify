<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('user.users');  // Menampilkan halaman user management
    }
}
