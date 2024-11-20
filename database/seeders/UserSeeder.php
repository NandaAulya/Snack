<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'ndut',
            'email' => 'nanda@gmail.com',
            'full_name' => 'nandut',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
