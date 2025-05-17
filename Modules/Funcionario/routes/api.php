<?php

use Illuminate\Support\Facades\Route;
use Modules\Funcionario\Http\Controllers\AuthFuncionarioController;
use Modules\Funcionario\Http\Controllers\FuncionarioController;

Route::middleware('auth:funcionario')->group(function () {
    Route::post('/funcionario/cadastro', [FuncionarioController::class, 'create']);
    Route::post('/funcionario/logout', [AuthFuncionarioController::class, 'logout']);
    Route::post('/funcionario/refresh', [AuthFuncionarioController::class, 'refresh']);
    Route::get('/funcionario/me', [AuthFuncionarioController::class, 'me']);
    Route::get('/funcionario/read', [FuncionarioController::class, 'read']);
    Route::put('/funcionario/{id}', [FuncionarioController::class, 'update']);
});
