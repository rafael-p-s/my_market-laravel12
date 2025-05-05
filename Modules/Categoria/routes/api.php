<?php

use Illuminate\Support\Facades\Route;
use Modules\Categoria\Http\Controllers\CategoriaController;

/* Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('categorias', CategoriaController::class)->names('categoria');
});
 */

 Route::prefix('v1')->group(function () {
    Route::post('categorias', [CategoriaController::class, 'create']);
    Route::get('categorias', [CategoriaController::class, 'read']);
    Route::put('categorias/{id}', [CategoriaController::class, 'update']);
    Route::delete('categorias/{id}', [CategoriaController::class, 'delete']);
 });