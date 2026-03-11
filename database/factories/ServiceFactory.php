<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'name'                  => fake()->sentence(2),
            'slug'                  => fake()->slug(),
            'image'                 => fake()->imageUrl(640, 480, 'technology', true),
            'excerpt'               => fake()->text(100),
            'deskripsi'             => fake()->paragraphs(2, true),
            'service_category_id'   => ServiceCategory::factory(),
            'is_active'             => fake()->boolean(80), // 80% chance true
            'sort_order'            => fake()->numberBetween(1, 10),
        ];
    }
}