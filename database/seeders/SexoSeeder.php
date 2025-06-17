<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sexo;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sexo::create(['nome' => 'Masculino']);
        Sexo::create(['nome' => 'Feminino']);
        Sexo::create(['nome' => 'Outro']);
    }
}
