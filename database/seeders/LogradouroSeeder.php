<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Logradouro;
use App\Models\Cras; // Para buscar um CRAS existente
use App\Models\TerritorioConselhoTutelar; // Para buscar um Território existente

class LogradouroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Certifique-se de que CRAS e TerritorioConselhoTutelar já foram criados
        $crasCentro = Cras::where('nome', 'CRAS Centro')->first();
        $crasSul = Cras::where('nome', 'CRAS Sul')->first();
        $territorioI = TerritorioConselhoTutelar::where('nome', 'I')->first();
        $territorioII = TerritorioConselhoTutelar::where('nome', 'II')->first();

        // Certifique-se de que CRAS e TerritorioConselhoTutelar existem antes de usar seus IDs
        if ($crasCentro && $territorioI) {
            Logradouro::create([
                'cep' => '09750-000',
                'vila' => 'Centro',
                'bairro' => 'Centro',
                'cras_id' => $crasCentro->id, // Associa ao CRAS Centro
                'territorio_conselho_tutelar_id' => $territorioI->id,
                'ativo' => true,
            ]);
        }

        if ($crasSul && $territorioII) {
            Logradouro::create([
                'cep' => '09780-123',
                'vila' => 'Jardim Primavera',
                'bairro' => 'Nova Esperança',
                'cras_id' => $crasSul->id, // Associa ao CRAS Sul
                'territorio_conselho_tutelar_id' => $territorioII->id,
                'ativo' => true,
            ]);
        }
    }
}
