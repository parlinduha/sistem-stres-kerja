<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1234567890'),
            'role' => 'admin',
            'gender' => 'male',
            'address' => 'Jl. Raya Kota'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('1234567890'),
            'role' => 'staff',
            'gender' => 'female',
            'address' => 'Jl. Mawar Indah'
        ]);
    }
}
