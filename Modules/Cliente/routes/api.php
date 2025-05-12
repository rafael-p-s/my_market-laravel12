<?php

use Illuminate\Support\Facades\Route;
use Modules\Cliente\Http\Controllers\ClienteController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('clientes', ClienteController::class)->names('cliente');
});
