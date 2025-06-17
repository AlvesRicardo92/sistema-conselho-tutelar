<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            SexoSeeder::class,
            TerritorioConselhoTutelarSeeder::class,

            CrasSeeder::class,             // Cria os CRAS (logradouro_id será null/vazio)
            LogradouroSeeder::class,       // Cria os Logradouros (associando a CRAS)

            // AGORA, que ambos têm dados, você pode atualizar o CRAS com seu logradouro
            CrasLogradouroUpdaterSeeder::class,

            ProcedimentoSeeder::class, // Se você tiver um, pode vir depois de Logradouro e Usuário
        ]);
    }
}
