<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            'title'       => fake()->sentence(3),
            'image'       => fake()->imageUrl(800, 600, 'nature', true),
            'description' => fake()->paragraph(),
        ];
    }
}