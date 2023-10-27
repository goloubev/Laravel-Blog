<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create();
        $title = $faker->sentence();

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug($title),
            'title' => $title,
            'thumbnail' => '/images/illustration-' . rand(1, 5) . '.png',
            'excerpt' => '<p>' . implode('</p><p>', $faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $faker->paragraphs(6)) . '</p>',
        ];
    }
}
