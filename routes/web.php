<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProcedimentoController;
use Illuminate\Support\Facades\Route;

// Rota padrão para a página de login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   // Rotas de Procedimentos
   Route::get('/procedimentos', [ProcedimentoController::class, 'index'])->name('procedimentos.index');
   Route::get('/procedimentos/novo', [ProcedimentoController::class, 'create'])->name('procedimentos.create');
   Route::post('/procedimentos', [ProcedimentoController::class, 'store'])->name('procedimentos.store');
   // Adicione rotas para edição, visualização e exclusão de procedimentos se necessário
});

require __DIR__.'/auth.php';
