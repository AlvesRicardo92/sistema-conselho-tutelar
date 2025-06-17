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
        Schema::create('logradouros', function (Blueprint $table) {
            $table->id();
            $table->string('cep', 9); // xxxxx-xxx
            $table->string('vila')->nullable();
            $table->string('bairro');
            $table->foreignId('cras_id')->constrained('cras');
            $table->foreignId('territorio_conselho_tutelar_id')->constrained('territorio_conselho_tutelars');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logradouros');
    }
};
