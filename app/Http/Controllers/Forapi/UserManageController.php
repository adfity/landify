<?php

namespace App\Http\Controllers\Forapi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserManageController extends Controller
{
    // Menampilkan data pengguna yang terautentikasi
    public function edit()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    // Memperbarui data pengguna yang terautentikasi
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $fileName = time() . '.' . $request->profile_picture->extension();
            $path = $request->profile_picture->storeAs('public/profile', $fileName);
            $user->profile_picture = $fileName;
        }

        $user->update($request->only('name', 'address', 'gender', 'phone'));

        return response()->json(['message' => 'Profile updated successfully.'], 200);
    }
}
