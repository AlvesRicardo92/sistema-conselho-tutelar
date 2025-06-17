<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuário Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@conselho.com',
            'password' => Hash::make('password'), // Altere para uma senha mais segura em produção
            'is_admin' => true,
            'ativo' => true,
        ]);

        // Usuário Comum
        User::create([
            'name' => 'Usuario Comum',
            'email' => 'comum@conselho.com',
            'password' => Hash::make('password'), // Altere para uma senha mais segura em produção
            'is_admin' => false,
            'ativo' => true,
        ]);
    }
}
