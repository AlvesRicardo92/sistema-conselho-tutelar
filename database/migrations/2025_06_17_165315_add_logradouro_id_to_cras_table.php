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
        Schema::table('cras', function (Blueprint $table) {
            // Remove a coluna de texto 'endereco' se ela ainda existir
            if (Schema::hasColumn('cras', 'endereco')) {
                $table->dropColumn('endereco');
            }
            // Adiciona a nova coluna logradouro_id como chave estrangeira
            // PRECISA ser nullable para evitar o problema de circularidade durante o seeding,
            // já que um logradouro pode precisar de um CRAS e um CRAS pode precisar de um logradouro.
            // Você pode preencher depois via seeders ou aplicação.
            $table->foreignId('logradouro_id')->nullable()->constrained('logradouros')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cras', function (Blueprint $table) {
            $table->dropForeign(['logradouro_id']);
            $table->dropColumn('logradouro_id');
            // Opcional: Adiciona a coluna de texto 'endereco' de volta se você a removeu no up()
            // $table->string('endereco')->nullable()->after('email');
        });
    }
};
