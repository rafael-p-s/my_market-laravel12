<?php

use Illuminate\Support\Facades\Route;
use Modules\Fornecedor\Http\Controllers\FornecedorController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('fornecedors', FornecedorController::class)->names('fornecedor');
});
