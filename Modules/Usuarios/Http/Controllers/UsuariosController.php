<?php

namespace Modules\Usuarios\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Usuarios\Entities\ModelUsuarios;
use Modules\Usuarios\Http\Requests\CreateUsuariosRequest;

class UsuariosController extends Controller
{
    public function create(CreateUsuariosRequest $req)
    {
        try {

            $cargoId = $req->funcionario !== true ? 0 : $req->cargo_id;

            $usuarios = ModelUsuarios::create([
                'nome'=>$req->nome,
                'sobrenome'=>$req->sobrenome,
                'cpf'=>$req->cpf,
                'telefone'=>$req->telefone,
                'celular'=>$req->celular,
                'endereco'=>$req->endereco,
                'cidade'=>$req->cidade,
                'estado'=>$req->estado,
                'funcionario'=>$req->funcionario,
                'cargo_id'=>$cargoId,
                'email'=>$req->email,
                'password' => Hash::make($req->password),
            ]);

            return response()->json(['message'=>'Usuário cadastrado.'], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao cadastrar usuário.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

}