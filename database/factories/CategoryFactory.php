<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create();
        $name = $faker->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
