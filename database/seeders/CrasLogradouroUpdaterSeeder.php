<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cras;
use App\Models\Logradouro;

class CrasLogradouroUpdaterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crasCentro = Cras::where('nome', 'CRAS Centro')->first();
        $logradouroCentro = Logradouro::where('bairro', 'Centro')->first();

        if ($crasCentro && $logradouroCentro) {
            $crasCentro->update(['logradouro_id' => $logradouroCentro->id]);
        }

        $crasSul = Cras::where('nome', 'CRAS Sul')->first();
        $logradouroNovaEsperanca = Logradouro::where('bairro', 'Nova Esperança')->first();

        if ($crasSul && $logradouroNovaEsperanca) {
            $crasSul->update(['logradouro_id' => $logradouroNovaEsperanca->id]);
        }

        // Você pode adicionar mais associações aqui conforme necessário
    }
}
