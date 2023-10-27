<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

// php artisan migrate:fresh --seed
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Vadim Goloubev',
            'username' => 'goloubev',
            'email' => 'goloubev@hotmail.com',
            'password' => bcrypt('123'),
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);

        Post::factory(5)->create([
            'user_id' => User::factory()->create()->id
        ]);
    }
}
