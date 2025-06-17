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
        Schema::create('territorio_conselho_tutelars', function (Blueprint $table) { // <-- Remova o 'e' aqui
            $table->id();
            $table->string('nome'); // I, II, III
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('territorio_conselho_tutelars'); // <-- Remova o 'e' aqui
    }
};
