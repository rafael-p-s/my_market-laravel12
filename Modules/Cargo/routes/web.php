<?php

use Illuminate\Support\Facades\Route;
use Modules\Cargo\Http\Controllers\CargoController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cargos', CargoController::class)->names('cargo');
});
