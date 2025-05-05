<?php

use Illuminate\Support\Facades\Route;
use Modules\Fornecedor\Http\Controllers\FornecedorController;

/* Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('fornecedors', FornecedorController::class)->names('fornecedor');
}); */

Route::prefix('v1')->group(function () {
    Route::post('fornecedor', [FornecedorController::class, 'create']);
    Route::get('fornecedor', [FornecedorController::class, 'read']);
    Route::put('fornecedor/{id}', [FornecedorController::class, 'update']);
    Route::delete('fornecedor/{id}', [FornecedorController::class, 'delete']);
});