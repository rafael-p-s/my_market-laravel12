<?php

namespace Modules\Produto\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedProduto
{
    public function handle(Request $req, Closure $next)
    {
        if (!$req->bearerToken()) {
            return response()->json(['error' => 'Token não informado.'], 401);
        }

        try {
            $user = auth('funcionario')->user();

            if (!$user) {
                return response()->json(['error'=>'Você não está autenticado.']. 401);
            }

            /**
                 * Lista de cargos disponíveis no sistema:
                 *
                 * @Cargos
                 * 1 = Administrador
                 * 2 = Gerente Geral
                 * 3 = Gerente do Setor
                 * 4 = Fornecedor
                 * 5 = Supervisor Geral
                 * 6 = Supervisor do Setor
                 * 7 = Funcionário Estoque
             */
            $cargoId = [1,2,3,4,5,6,7];
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error'=>'Acesso não autorizado.'], 403);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error na autenticação.'], 401);
        }

        return $next($req);
    }
}
