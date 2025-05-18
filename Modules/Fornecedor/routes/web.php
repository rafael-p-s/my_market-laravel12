<?php

use Illuminate\Support\Facades\Route;
use Modules\Fornecedor\Http\Controllers\FornecedorController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('fornecedors', FornecedorController::class)->names('fornecedor');
});
