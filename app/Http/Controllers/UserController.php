<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    
    public function edit()
    {
        $user = Auth::user();
        return view('auth.update', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'phone' => 'nullable|string|max:15',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $user = Auth::user();
    
        // Jika ada file baru yang diunggah
        if ($request->hasFile('profile_picture')) {
            // Hapus file lama jika ada
            if ($user->profile_picture) {
                $oldFilePath = storage_path('app/public/profile/' . $user->profile_picture);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
    
            // Simpan file baru
            $fileName = time() . '.' . $request->profile_picture->extension();
            $path = $request->profile_picture->storeAs('public/profile', $fileName);
    
            // Update kolom di database
            $user->profile_picture = $fileName;
        }
    
        // Update data lainnya
        $user->update($request->only('name', 'last_name','address', 'gender', 'phone'));
    
        // Redirect dengan pesan sukses
        return redirect()->route('user.edit')->with('success', 'Profile updated successfully.');
    }
    
}

