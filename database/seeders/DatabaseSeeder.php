<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 20 notes, each associated with a random user
        Note::factory(20)->create();

        // Create a Test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'info@bishrulhaq.com',
            'password' => Hash::make('password'),
        ]);
    }
}
