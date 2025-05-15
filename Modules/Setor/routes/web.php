<?php

use Illuminate\Support\Facades\Route;
use Modules\Setor\Http\Controllers\SetorController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('setors', SetorController::class)->names('setor');
});
