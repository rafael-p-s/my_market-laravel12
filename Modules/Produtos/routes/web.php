<?php

use Illuminate\Support\Facades\Route;
use Modules\Produtos\Http\Controllers\ProdutosController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('produtos', ProdutosController::class)->names('produtos');
});
