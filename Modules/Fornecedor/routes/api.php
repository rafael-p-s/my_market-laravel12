<?php

use Illuminate\Support\Facades\Route;
use Modules\Fornecedor\Http\Controllers\AuthFornecedorController;
use Modules\Fornecedor\Http\Controllers\FornecedorController;

Route::middleware(['auth:funcionario'])->group(function () {
    Route::post('/fornecedor/cadastro', [FornecedorController::class, 'create']);
    Route::get('/fornecedor/read', [FornecedorController::class, 'read']);
    Route::put('/fornecedor/{id}', [FornecedorController::class, 'update']);
});
Route::middleware(['auth:fornecedor', 'block_if_authenticated_fornecedor'])->group(function () {
    Route::post('/fornecedor/logout', [AuthFornecedorController::class, 'logout']);
    Route::post('/fornecedor/refresh', [AuthFornecedorController::class, 'refresh']);
    Route::get('/fornecedor/me', [AuthFornecedorController::class, 'me']);
});
