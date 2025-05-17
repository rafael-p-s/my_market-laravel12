<?php

namespace Modules\AuthController\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $req){
        if ($req->has('email') && $req->has('password')) {
            return app(\Modules\Cliente\Http\Controllers\AuthClienteController::class)->login($req);
        }

        if ($req->has('cpf') && $req->has('password')) {
            return app (\Modules\Funcionario\Http\Controllers\AuthFuncionarioController::class)->login($req);
        }

        return response()->json(['error'=>'Credenciais erradas, verificar.'], 401);
    }
}
