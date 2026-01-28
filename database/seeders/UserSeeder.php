<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@bengkel.test',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'kasir',
            'email' => 'kasir@bengkel.test',
            'password' => 'kasir123',
            'role' => 'kasir',
        ]);
    }
}
