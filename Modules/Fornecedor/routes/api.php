<?php

use Illuminate\Support\Facades\Route;
use Modules\Fornecedor\Http\Controllers\FornecedorController;

/* Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('fornecedors', FornecedorController::class)->names('fornecedor');
}); */

Route::prefix('v1')->group(function () {
    Route::post('fornecedores', [FornecedorController::class, 'create']);
    Route::get('fornecedores', [FornecedorController::class, 'read']);
    Route::put('fornecedores/{id}', [FornecedorController::class, 'update']);
    Route::delete('fornecedores/{id}', [FornecedorController::class, 'delete']);
});