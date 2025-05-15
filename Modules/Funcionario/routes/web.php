<?php

use Illuminate\Support\Facades\Route;
use Modules\Funcionario\Http\Controllers\FuncionarioController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('funcionarios', FuncionarioController::class)->names('funcionario');
});
