<?php

use Illuminate\Support\Facades\Route;
use Modules\Setor\Http\Controllers\SetorController;

Route::middleware(['auth:setor', 'block_if_authenticated_setor'])->group(function() {
    Route::post('/setor/cadastro', [SetorController::class, 'create']);
    Route::get('/setor/read', [SetorController::class, 'read']);
    Route::get('/setor/buscarSetor/{nome_setor}', [SetorController::class, 'findSetor']);
    Route::put('/seto/{id}', [SetorController::class, 'update']);
});