<?php

use Illuminate\Support\Facades\Route;
use Modules\Produto\Http\Controllers\ProdutoController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('produtos', ProdutoController::class)->names('produto');
});
