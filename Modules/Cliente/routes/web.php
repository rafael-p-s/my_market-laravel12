<?php

use Illuminate\Support\Facades\Route;
use Modules\Cliente\Http\Controllers\ClienteController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('clientes', ClienteController::class)->names('cliente');
});
