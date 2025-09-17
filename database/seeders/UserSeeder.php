<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Account',
            'email' => 'admin@govnid.local',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 20 Users
        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@govnid.local",
                'password' => Hash::make('password123'),
                'role' => 'user',
            ]);
        }
    }
}
