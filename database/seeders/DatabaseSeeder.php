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

        // Test User (Student)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);

        // Administrator
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'role' => 'administrator',
        ]);

        // Instructor
        User::create([
            'name' => 'Instructor',
            'email' => 'instructor@example.com',
            'password' => bcrypt('instructor123'),
            'role' => 'instructor',
        ]);

        // Original user
        User::create([
            'name' => 'Naruebest Pun',
            'email' => 'naruebest.pun@rmutto.ac.th',
            'password' => bcrypt('password123'),
            'role' => 'instructor',
        ]);
    }
}
