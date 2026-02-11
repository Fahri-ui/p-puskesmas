<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kategori' => $this->faker->unique()->word()
        ];
    }
}
