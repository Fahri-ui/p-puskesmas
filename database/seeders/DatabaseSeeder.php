<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\BlogCategory::factory(5)->create();

        \App\Models\Blog::factory(10)->create();

        \App\Models\ServiceCategory::factory(5)->create();

        \App\Models\Service::factory(10)->create();

        \App\Models\Gallery::factory(10)->create();

        \App\Models\Staf::factory(10)->create();

        \App\Models\User::factory(1)->create();
    }
}
