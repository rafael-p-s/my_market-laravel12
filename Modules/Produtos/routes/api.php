<?php

// use Illuminate\Routing\Route;
use Modules\Produtos\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

// Essa parte cria, de maneira automática, as rotas.
/* Route::apiResource('produtos', ProdutosController::class); */

Route::prefix('v1')->group(function () {
    Route::post('produtos',[ProdutosController::class, 'create']);
    Route::get('produtos', [ProdutosController::class, 'read']);
    Route::put('produtos/{id}', [ProdutosController::class, 'update']);
    Route::delete('produtos/{id}', [ProdutosController::class, 'delete']);
});