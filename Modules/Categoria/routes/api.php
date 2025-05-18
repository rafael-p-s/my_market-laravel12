<?php

use Illuminate\Support\Facades\Route;
use Modules\Categoria\Http\Controllers\CategoriaController;

Route::middleware(['auth:categoria', 'block_if_authenticated_categoria'])->group(function() {
    Route::post('/categoria/cadastro', [CategoriaController::class, 'create']);
    Route::get('/categoria/read', [CategoriaController::class, 'read']);
    Route::put('/categoria/{id}', [CategoriaController::class, 'update']);
});