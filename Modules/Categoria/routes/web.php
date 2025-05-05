<?php

use Illuminate\Support\Facades\Route;
use Modules\Categoria\Http\Controllers\CategoriaController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categorias', CategoriaController::class)->names('categoria');
});
