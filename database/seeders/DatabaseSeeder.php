<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()
            ->create([
                'name' => 'Admin User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        User::factory(10)->create();
        Enrollment::factory(10)->create();
    }
}
