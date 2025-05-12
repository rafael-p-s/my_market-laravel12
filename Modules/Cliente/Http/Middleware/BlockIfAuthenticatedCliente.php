<?php

namespace Modules\Cliente\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BlockIfAuthenticatedCliente
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (auth('cliente')->check()) {
                return response()->json(['error' => 'Você já está autenticado. Cadastro não permitido.'], 403);
            }
        } catch (\Exception $e) {
            // Se falhar a verificação do token, segue o fluxo normalmente
        }

        return $next($request);
    }
}
