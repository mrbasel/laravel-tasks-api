<?php

namespace Database\Seeders;

use App\Models\Task;
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
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('test123')
        ]);
        $user->tasks()->saveMany([
            new Task(['title' => 'Prepare lunch']),
            new Task(['title' => 'Wash dishes']),
            new Task(['title' => 'Study']),
            new Task(['title' => 'Visit family']),
        ]);
    }
}
