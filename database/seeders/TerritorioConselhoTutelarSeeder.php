<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TerritorioConselhoTutelar;

class TerritorioConselhoTutelarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TerritorioConselhoTutelar::create(['nome' => 'I']);
        TerritorioConselhoTutelar::create(['nome' => 'II']);
        TerritorioConselhoTutelar::create(['nome' => 'III']);
    }
}
