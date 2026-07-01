<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'name' => 'Admin Hotel',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
            
        );
        User::create([
    'name' => 'User Hotel',
    'email' => 'user@hotel.com',
    'password' => bcrypt('user123'),
    'role' => 'user',
]);
    }
}