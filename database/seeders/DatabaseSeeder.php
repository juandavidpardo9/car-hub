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
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@carhub.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer@carhub.com'],
            [
                'name' => 'Cliente Test',
                'password' => Hash::make('cliente12345'),
                'role' => 'customer',
            ]
        );
    }
}
