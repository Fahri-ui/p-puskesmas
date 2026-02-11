<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . uniqid(),
            'content' => $this->faker->paragraphs(6, true),
            'excerpt' => $this->faker->sentence(20),
            'thumbnail' => 'default-thumb.jpg',
            'image' => 'default.jpg',
            'category_id' => BlogCategory::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['draft', 'publish', 'archived']),
            'published_at' => now(),
        ];
    }
}
