<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        'name' => 'Test Consumer',
        'email' => 'consumer@test.com',
        'password' => Hash::make('password'),
        'role' => 'consumer',
    ]);

    User::create([
        'name' => 'Help Desk Agent',
        'email' => 'agent@test.com',
        'password' => Hash::make('password'),
        'role' => 'help_desk_agent',
    ]);

    User::create([
        'name' => 'System Admin',
        'email' => 'admin@test.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);
    }
}
