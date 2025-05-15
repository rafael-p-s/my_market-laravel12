<?php

namespace Modules\Funcionario\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthFuncionarioController extends Controller
{
    public function login(Request $req)
    {
        $credentialsFunc = $req->only('cpf', 'password');

        if (!$token = auth('funcionario')->attempt($credentialsFunc)) {
            return response()->json(['error' => 'Credenciais inválidas.'], 401);
        }

        $funcionario = auth('funcionario')->user();

        return response()->json([
            'token' => $token,
            'funcionario' => $funcionario,
        ]);
    }

    public function me()
    {
        return response()->json(auth('funcionario')->user());
    }

    public function logout()
    {
        auth('funcionario')->logout();
        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        /** @var JWTGuard $auth */
        $auth = auth('funcionario');

        $newToken = $auth->refresh();

        return response()->json([
            'acess_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => $auth->factory()->getTTL() * 60,
        ]);
    }
}
