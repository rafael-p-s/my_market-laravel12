<?php


use Illuminate\Support\Facades\Route;
use Modules\Cliente\Http\Controllers\AuthClienteController;
use Modules\Cliente\Http\Controllers\ClienteController;

/*
|--------------------------------------------------------------------------
| API Routes para o módulo Cliente
|--------------------------------------------------------------------------
*/

// ROTAS PÚBLICAS (usuário não pode estar autenticado)
Route::middleware('block_if_authenticated')->group(function () {
    Route::post('/cliente/cadastro', [ClienteController::class, 'create']);
    Route::post('/cliente/login', [AuthClienteController::class, 'login']);
});

// ROTAS PRIVADAS (usuário autenticado com JWT de cliente)
Route::middleware('auth:cliente')->group(function () {
    Route::get('/cliente/me', [AuthClienteController::class, 'me']);
    Route::post('/cliente/logout', [AuthClienteController::class, 'logout']);
    Route::post('/cliente/refresh', [AuthClienteController::class, 'refresh']);
    Route::get('/cliente', [ClienteController::class, 'read']);
    Route::put('/cliente/{id}', [ClienteController::class, 'update']);
    // Route::delete('/cliente/{id}', [ClienteController::class, 'delete']); // não vai se deletar usuário.
});