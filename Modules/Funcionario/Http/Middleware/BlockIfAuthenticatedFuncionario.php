<?php

namespace Modules\Funcionario\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedFuncionario
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o token bearer foi informado
        if (!$request->bearerToken()) {
            return response()->json(['error' => 'Token não informado.'], 401);
        }

        // Tenta autenticar o usuário como "funcionario"
        try {
            // Verifica se o usuário está autenticado
            $user = auth('funcionario')->user();

            // Se não estiver autenticado, retorna erro
            if (!$user) {
                return response()->json(['error' => 'Você não está autenticado.'], 401);
            }

            // Verifica se o cargo do usuário está na lista permitida
            $cargoId = [1, 2, 3]; // 1 = ADM, 2 = Gerente Geral, 3 = Gerente do setor
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error' => 'Acesso não autorizado.'], 403);
            }

        } catch (\Exception $e) {
            // Caso ocorra algum erro durante o processo de autenticação
            return response()->json(['error' => 'Erro na autenticação.'], 401);
        }

        // Se passou por todas as verificações, prossegue com a requisição
        return $next($request);
    }
}
