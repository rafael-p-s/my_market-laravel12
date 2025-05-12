<?php

namespace Modules\Cliente\Http;

class Kernel
{
    protected $routeMiddleware = [
        'block.auth.cliente' => \Modules\Cliente\Http\Middleware\BlockIfAuthenticatedCliente::class,
    ];
}