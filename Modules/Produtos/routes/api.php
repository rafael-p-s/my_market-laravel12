<?php

use Illuminate\Support\Facades\Route;
use Modules\Produtos\Http\Controllers\ProdutosController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('produtos', ProdutosController::class)->names('produtos');
});
