<?php

namespace Modules\Fornecedor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthFornecedorController extends Controller
{
   public function login (Request $req)
   {
    $credentilas = $req->only('cnpj', 'password');

    if (!$token = auth('fornecedor')->attempt($credentilas)) {
        return response()->json(['error'=>'Credenciais inválidas para fornecedor'], 401);
    }

    $fornecedor = auth('fornecedor')->user();

    return response()->json([
        'token'=>$token,
        'fornecedor'=>$fornecedor
    ]);
   }

   public function me()
   {
    return response()->json(auth('fornecedor')->user());
   }

   public function logout()
   {
    auth('fornecedor')->logout();
    return response()->json(['message'=>'Logout realizado com sucesso.']);
   }

   /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        /** @var JWTGuard $auth */
        $auth = auth('fornecedor');

        $newToken = $auth->refresh();

        return response()->json([
            'acess_token' => $newToken,
            'token_type' => 'bearer',
            'expires_in' => $auth->factory()->getTTL() * 60,
        ]);
    }
}
