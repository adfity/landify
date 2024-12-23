<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Action;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count(); // Hanya menghitung pengguna dengan peran 'user'
        $users = User::where('role', 'user')->get(); // Mendapatkan data pengguna dengan peran 'user'
        $growthLabels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Agustus', 'Oktober', 'September','November','Desember'];
        $growthData = [10, 20, 15, 25]; 
        $activeSessions = User::whereNotNull('last_login_at')->count(); 
        $newRegistrations = User::where('created_at', '>=', now()->subDays(7))->count();

    
        $pendingActions = Action::where('status', 'pending')->count();
        return view('admin.index', compact('totalUsers','users','growthLabels', 'newRegistrations', 'pendingActions','growthData','activeSessions'));
    }
    

    //MANAGE ACCOUNT USER
    public function user_index()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.account_user.index', compact('users'));
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account_user.edit', compact('user'));
    }

    // Update the user
    public function user_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'gender' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }

    // Delete the user
    public function user_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }


}

