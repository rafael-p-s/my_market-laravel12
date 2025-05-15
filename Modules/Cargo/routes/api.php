<?php

use Illuminate\Support\Facades\Route;
use Modules\Cargo\Http\Controllers\CargoController;

Route::middleware(['auth:cargo', 'block_if_authenticated_cargo'])->group(function() {
    Route::post('/cargo/cadastro', [CargoController::class, 'create']);
    Route::get('/cargo/read', [CargoController::class, 'read']);
    Route::get('/cargo/buscarCargo/{nome_string}', [CargoController::class, 'findCargo']);
    Route::put('/cargo/{id}', [CargoController::class, 'update']);
});