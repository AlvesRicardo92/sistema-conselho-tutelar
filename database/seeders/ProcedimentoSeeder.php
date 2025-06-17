<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Procedimento;
use App\Models\User;
use App\Models\Sexo;
use App\Models\Logradouro;

class ProcedimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Certifique-se de que esses registros existem antes de usá-los
        $userAdmin = User::where('email', 'admin@conselho.com')->first();
        $sexoMasculino = Sexo::where('nome', 'Masculino')->first();
        $logradouroCentro = Logradouro::where('bairro', 'Centro')->first();

        if ($userAdmin && $sexoMasculino && $logradouroCentro) {
            Procedimento::create([
                'numero_procedimento' => 1,
                'ano_procedimento' => 2025,
                'nome_pessoa_atendida'=>'NOME TESTE PESSOA ATENDIDA',
                'nome_genitora_pessoa_atendida'=>'NOME TESTE GENITORA PESSOA ATENDIDA',
                'data_nascimento_pessoa_atendida'=> '1990-05-23',
                'sexo_id' => $sexoMasculino->id,
                'logradouro_id' => $logradouroCentro->id,
                'origem_criacao'=> 'EMEB xxxxxxxx',
                'data_hora_criacao' => now(),
                'criado_por_user_id' => $userAdmin->id
            ]);

            Procedimento::create([
                'numero_procedimento' => 1,
                'ano_procedimento' => 2024,
                'nome_pessoa_atendida'=>'NOME TESTE PESSOA ATENDIDA2',
                'nome_genitora_pessoa_atendida'=>'NOME TESTE GENITORA PESSOA ATENDIDA2',
                'data_nascimento_pessoa_atendida'=> '1989-08-10',
                'sexo_id' => $sexoMasculino->id,
                'logradouro_id' => $logradouroCentro->id,
                'origem_criacao'=> 'EMEB yyyy',
                'data_hora_criacao' => now(),
                'criado_por_user_id' => $userAdmin->id
            ]);

            Procedimento::create([
                'numero_procedimento' => 2,
                'ano_procedimento' => 2024,
                'nome_pessoa_atendida'=>'NOME TESTE PESSOA ATENDIDA3',
                'nome_genitora_pessoa_atendida'=>'NOME TESTE GENITORA PESSOA ATENDIDA3',
                'data_nascimento_pessoa_atendida'=> '1992-2-15',
                'sexo_id' => $sexoMasculino->id,
                'logradouro_id' => $logradouroCentro->id,
                'origem_criacao'=> 'EMEB zzzzz',
                'data_hora_criacao' => now(),
                'criado_por_user_id' => $userAdmin->id
            ]);
        }
    }
}
