<?php

namespace Modules\Fornecedor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedFornecedor
{
    public function handle(Request $req, Closure $next)
    {
        if (!$req->bearerToken()) {
            return response()->json(['error' => 'Token não informado.'], 401);
        }

        try {
            $user = auth('fornecedor')->user();
            if (!$user) {
                return response()->json(['error' => 'Você não está autenticado.'], 401);
            }
            $cargoId = [1, 2, 3, 4]; // 4 fornecedor
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error' => 'Acesso não autorizado.'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na autenticação.'], 401);
        }
        return $next($req);
    }
}
