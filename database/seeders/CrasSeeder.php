<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cras;

class CrasSeeder extends Seeder
{
    public function run(): void
    {
        // Cria os CRAS sem associar a um logradouro inicialmente.
        // O campo logradouro_id (se adicionado via migração posterior e nullable)
        // será null por padrão ou será populado por um seeder posterior.
        Cras::create([
            'nome' => 'CRAS Centro',
            'telefone' => '(11) 1111-1111',
            'email' => 'cras.centro@example.com',
            'ativo' => true,
        ]);

        Cras::create([
            'nome' => 'CRAS Sul',
            'telefone' => '(11) 2222-2222',
            'email' => 'cras.sul@example.com',
            'ativo' => true,
        ]);

        Cras::create([
            'nome' => 'CRAS Leste',
            'telefone' => '(11) 3333-3333',
            'email' => 'cras.leste@example.com',
            'ativo' => true,
        ]);
    }
}
