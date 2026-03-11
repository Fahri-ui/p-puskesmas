<?php

namespace Database\Factories;

use App\Models\Staf;
use Illuminate\Database\Eloquent\Factories\Factory;

class StafFactory extends Factory
{
    protected $model = Staf::class;

    public function definition()
    {
        return [
            'foto'                => fake()->imageUrl(400, 400, 'people', true),
            'nama'                => fake()->name(),
            'telepon'             => fake()->phoneNumber(),
            'email'               => fake()->unique()->safeEmail(),
            'jenis_kelamin'       => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'tanggal_lahir'       => fake()->date('Y-m-d', '-18 years'),
            'profesi'             => fake()->jobTitle(),
            'nip'                 => fake()->unique()->numerify('NIP-##########'),
            'jabatan'             => fake()->jobTitle(),
            'deskripsi'           => fake()->paragraph(),
            'alamat'              => fake()->address(),
            'pendidikan_terakhir' => fake()->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
            'bergabung_sejak'     => fake()->date('Y-m-d', '-5 years'),
            'urutan'              => fake()->numberBetween(1, 50),
        ];
    }
}