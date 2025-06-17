<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('procedimentos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_procedimento');
            $table->integer('ano_procedimento');
            $table->string('nome_pessoa_atendida');
            $table->string('nome_genitora_pessoa_atendida')->nullable();
            $table->date('data_nascimento_pessoa_atendida');
            $table->foreignId('sexo_id')->constrained('sexos');
            $table->foreignId('logradouro_id')->constrained('logradouros');
            $table->string('origem_criacao'); // familiar, unidade de saúde, unidade escolar, etc.
            $table->timestamp('data_hora_criacao')->useCurrent();
            $table->foreignId('criado_por_user_id')->constrained('users');
            $table->timestamp('data_hora_atualizacao')->nullable();
            $table->foreignId('atualizado_por_user_id')->nullable()->constrained('users');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('procedimentos');
    }
};
