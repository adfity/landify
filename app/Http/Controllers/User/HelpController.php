<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index()
    {
        return view('user.helpcenter.index');  // Menampilkan halaman help & support
    }
    public function getting()
    {
        return view('user.helpcenter.getting.index');  // Menampilkan halaman help & support
    }
}
