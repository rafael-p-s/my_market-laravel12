<?php

namespace Modules\Funcionario\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Funcionario\Entities\ModelFuncionario;
use Modules\Funcionario\Http\Requests\CreateRequestFuncionario;

class FuncionarioController extends Controller
{
    public function create(CreateRequestFuncionario $req)
    {
        try {
            $funcionario = ModelFuncionario::create([
                "nome" => $req->nome,
                "sobrenome" => $req->sobrenome,
                "cpf" => $req->cpf,
                "telefone" => $req->telefone,
                "celular" => $req->celular,
                "endereco" => $req->endereco,
                "numero_casa" => $req->numero_casa,
                "complemento" => $req->complemento,
                "cidade" => $req->cidade,
                "estado" => $req->estado,

                "email" => $req->email,
                "password" => Hash::make($req->password),

                'cargo_id' => $req->cargo_id,
                'setor_id' => $req->setor_id,
            ]);

            return response()->json([
                'message' => 'Funcionario cadastrado com sucesso!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar o funcionario.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $funcionario = ModelFuncionario::orderBy('id')->get();
        if ($funcionario->isEmpty()) {
            return response()->json(['message' => "Nenhum funcionario encontrado."]);
        }

        return response()->json($funcionario, 200);
    }

    public function findFuncionario($cpf)
    {
        $funcionario = ModelFuncionario::where('cpf', $cpf)->first();

        if (!$funcionario) {
            return response()->json(['message' => '{$cpf} não encontrado.'], 404);
        }

        return response()->json($funcionario, 200);
    }

    public function update(Request $req, $id)
    {
        try {
            $funcionario = ModelFuncionario::find($id);

            if (!$funcionario) {
                return response()->json([
                    'error' => "Funcionario não encontrado."
                ], 404);
            }

            $funcionario->update(
                [
                    "nome" => $req->nome,
                    "sobrenome" => $req->sobrenome,
                    // "cpf" => $req->cpf,
                    "telefone" => $req->telefone,
                    "celular" => $req->celular,
                    "endereco" => $req->endereco,
                    "cidade" => $req->cidade,
                    "estado" => $req->estado,

                    "email" => $req->email, // não vai ser permitido alterar email.
                    "password" => Hash::make($req->password)
                ]
            );
        } catch (\Exception $e) {
            return response()->json([
                'erro' => 'Não foi possível atualizar cargo.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
