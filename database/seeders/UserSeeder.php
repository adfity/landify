<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kuda',
            'email' => 'kuda@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'user',  // Menetapkan role 'user'
        ]);
    
        // Membuat admin default dengan role 'admin'
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',  // Menetapkan role 'admin'
        ]);
    }
}
