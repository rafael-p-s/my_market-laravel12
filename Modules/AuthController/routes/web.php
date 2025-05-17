<?php

use Illuminate\Support\Facades\Route;
use Modules\AuthController\Http\Controllers\AuthControllerController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('authcontrollers', AuthControllerController::class)->names('authcontroller');
});
