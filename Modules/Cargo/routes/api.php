<?php

use Illuminate\Support\Facades\Route;
use Modules\Cargo\Http\Controllers\CargoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('cargos', CargoController::class)->names('cargo');
});
