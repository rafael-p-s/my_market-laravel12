<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'block_if_authenticated' => \Modules\Cliente\Http\Middleware\BlockIfAuthenticatedCliente::class,
            'block_if_authenticated_cargo' => \Modules\Cargo\Http\Middleware\BlockIfAuthenticatedCargo::class,
            'block_if_authenticated_setor' => \Modules\Setor\Http\Middleware\BlockIfAuthenticatedSetor::class,
            'block_if_authenticated_functionario' => \Modules\Funcionario\Http\Middleware\BlockIfAuthenticatedFuncionario::class,
            'block_if_authenticated_fornecedor' => \Modules\Fornecedor\Http\Middleware\BlockIfAuthenticatedFornecedor::class,
            'block_if_authenticated_produto' => \Modules\Produto\Http\Middleware\BlockIfAuthenticatedProduto::class,
            'block_if_authenticated_categoria' => \Modules\Categoria\Http\Middleware\BlockIfAuthenticatedCategoria::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
