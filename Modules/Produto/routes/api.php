<?php

use Illuminate\Support\Facades\Route;
use Modules\Produto\Http\Controllers\ProdutoController;

// Route::middleware('block_if_authenticated')->group(function () {});
Route::get('/produto/read', [ProdutoController::class, 'read']);
Route::get('/produto/buscar/{nome}', [ProdutoController::class, 'findProduto']);

Route::middleware(['auth:produto', 'block_if_authenticated_produto'])->group(function () {
    Route::post('/produto/cadastro', [ProdutoController::class, 'create']);
    Route::put('/produto/{id}', [ProdutoController::class, 'update']);
});
