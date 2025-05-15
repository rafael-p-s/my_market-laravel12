<?php

namespace Modules\Funcionario\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedFuncionario
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->bearerToke()) {
            return response()->json(['error' => 'Token não informado.'], 401);
        }

        try {
            $user = auth('funcionario')->user();
            if (!$user) {
                return response()->json(['error' => 'Você não está autenticado.'], 401);
            }

            $cargoId = [1, 2, 3]; // 1 ADM , 2 Gerente Geral, 3 Gerente do setor
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error' => 'Acesso não autorizado.'], 403);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro na autenticação.'], 401);
        }
        return $next($request);
    }
}
