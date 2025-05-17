<?php

use Illuminate\Support\Facades\Route;
use Modules\AuthController\Http\Controllers\AuthControllerController;

Route::middleware('block_if_authenticated')->post('/login', [\Modules\AuthController\Http\Controllers\AuthController::class, 'login']);
