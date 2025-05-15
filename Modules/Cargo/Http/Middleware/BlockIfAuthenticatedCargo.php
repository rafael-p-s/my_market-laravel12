<?php

namespace Modules\Cargo\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedCargo
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se há token
        if (!$request->bearerToken()) {
            return response()->json(['error' => 'Token não informado.'], 401);
        }

        try {
            $user = auth('funcionario')->user();
            if (!$user) {
                return response()->json(['error' => 'Você não está autenticado.'], 401);
            }

            $cargoId = [1,2]; // Change de numbers for id in 'cargo' table.
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error' => 'Acesso não autorizado.'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na autenticação.'], 401);
        }

        return $next($request);
    }
}