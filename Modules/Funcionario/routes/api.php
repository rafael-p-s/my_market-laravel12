<?php

use Illuminate\Support\Facades\Route;
use Modules\Funcionario\Http\Controllers\FuncionarioController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('funcionarios', FuncionarioController::class)->names('funcionario');
});
