<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pkmbinong.go.id'],
            [
                'name'     => 'PKM.Binong',
                'password' => Hash::make('pkm.binong#123'),
                'role'     => 'ADMIN',
            ]
        );
    }
}
