<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nurul Ariqah',
            'username' => 'nurularqh',
            'email' => 'nurul@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Novia Rahmadhani',
            'username' => 'noviarp',
            'email' => 'novia@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Diyang Raditya',
            'username' => 'diyangra',
            'email' => 'diyang@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
