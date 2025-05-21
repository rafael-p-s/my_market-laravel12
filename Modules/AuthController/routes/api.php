<?php

use Illuminate\Support\Facades\Route;
use Modules\AuthController\Http\Controllers\AuthController;

Route::middleware('block_if_authenticated')->post('/login', [AuthController::class, 'login']);
