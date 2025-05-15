<?php

namespace Modules\Setor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockIfAuthenticatedSetor
{
    public function handle(Request $request, Closure $next) {
        // Check if have token
        if (!$request->bearerToken()) {
            return response()->json(['error'=>'Token não informado.'], 401);
        }

        try {
            $user = auth('funcionario')->user();
            if (!$user) {
                return response()->json(['error'=>'Você não está autenticado.'], 401);
            }

            $cargoId = [1,2]; 
            if (!in_array($user->cargo_id, $cargoId)) {
                return response()->json(['error'=>'Acesso não atutorizado.'], 403);
            }

        } catch (\Exception $e){
            return response()->json(['error'=>'Erro na autenticação.'], 401);
        }

        return $next($request);
    }
}
