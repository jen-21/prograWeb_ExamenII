<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
       /**
     * Creacion el usuario administrador.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@agrovalle.hn'],
            [
                'name' => 'Administrador AGROVALLE',
                'password' => Hash::make('Agrovalle2026*'),
            ]
        );
    }
}
