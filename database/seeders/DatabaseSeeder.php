<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::insert([[
            'name' => 'karunia',
            'email' => 'karunia@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'admin',
        ], [
            'name' => 'aco',
            'email' => 'aco@gmail.com',
            'password' => bcrypt('1234567890'),
            'role' => 'pengelola',
        ]]);
    }
}
