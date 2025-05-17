<?php

namespace Modules\Cliente\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\JWTGuard;


class AuthClienteController extends Controller
{
    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (! $token = auth('cliente')->attempt($credentials)) {
            return response()->json(['error' => 'Credenciais inválidas para cliente.'], 401);
        }

        // $cliente = array_intersect_key(
        //     (array) auth('cliente')->user(),
        //     array_flip(['id', 'nome', 'sobrenome', 'email', 'cpf'])
        // );

        $cliente = auth('cliente')->user();

        return response()->json([
            'token' => $token,
            'cliente' => $cliente,
        ]);
    }

    public function me()
    {
        return response()->json(auth('cliente')->user());
    }

    public function logout()
    {
        auth('cliente')->logout();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        /** @var JWTGuard $auth */
        $auth = auth('cliente');

        $newToken = $auth->refresh();

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => $auth->factory()->getTTL() * 60,
        ]);
    }
}
