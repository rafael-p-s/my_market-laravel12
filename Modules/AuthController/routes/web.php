<?php

use Illuminate\Support\Facades\Route;
use Modules\AuthController\Http\Controllers\AuthController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('authcontrollers', AuthController::class)->names('authcontroller');
});
