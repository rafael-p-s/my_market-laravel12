<?php

namespace Modules\Cliente\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlockIfAuthenticatedCliente
{
    public function handle(Request $request, Closure $next)
    {
        // Serve para fazer testes
        /* dd([
            'auth_cliente_check' => Auth::guard('cliente')->check(),
            'user' => Auth::guard('cliente')->user(),
        ]); */
        try {
            // Só tenta autenticar se tiver token
            if ($request->bearerToken()) {
                if (auth('cliente')->check()) {
                    return response()->json(['error' => 'Você já está autenticado. Cadastro não permitido.'], 403);
                }
            }
        } catch (\Exception $e) {
            // Token inválido ou erro na autenticação, deixa seguir o fluxo
        }

        return $next($request);
    }
}
