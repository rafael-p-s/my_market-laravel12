<?php

namespace Modules\Produtos\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthControllerProdutos extends Controller
{
    // Create a JWT token for the user.

    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function me()
    {
        return response()->json(JWTAuth::user());
    }

    // The JWT token will be destroy.

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToke());
            return response()->json(['nessage' => 'Logout realizado com sucesso']);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Falha ao fazer logout'], 500);
        }
    }

    // Will create a new JWT token.

    public function refresh()
    {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());

            return response()->json([
                'access_tolen' => $newToken,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Não foi possivel renovar o token'], 401);
        }
    }
}
