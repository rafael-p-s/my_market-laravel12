<?php

namespace Modules\Fornecedor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Fornecedor\Entities\ModelFornecedor;

class FornecedorController extends Controller
{
    public function create(Request $req)
    {
        try {
            $fornecedor = ModelFornecedor::create([
                'nome' => $req->nome,
                'cnpj' => $req->cnpj,
                'telefone' => $req->telefone,
                "celular" => $req->celular,
                "endereco" => $req->endereco,
                "numero_casa" => $req->numero_casa,
                "complemento" => $req->complemento,
                "cidade" => $req->cidade,
                "estado" => $req->estado,

                "email" => $req->email,
                "password" => Hash::make($req->password),

                'cargo_id' => $req->cargo_id,
            ]);
            return response()->json([
                'message' => 'Fornecedor cadastrado com sucesso!',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar o fornecedor',
                'details' => $e->getMessage()

            ], 500);
        }
    }

    public function read()
    {
        $fornecedor = ModelFornecedor::orderBy('id')->get();
        if ($fornecedor->isEmpty()) {
            return response()->json(['message' => 'Nenhum fornecedor encontrado.'], 404);
        }
        return response()->json($fornecedor, 200);
    }

    public function findFornecedor($cnpj)
    {
        $fornecedor = ModelFornecedor::where('cnpj', $cnpj)->first();

        if (!$fornecedor) {
            return response()->json(['message' => "$cnpj não encontrado."], 404);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $fornecedor = ModelFornecedor::find($id);

            if (!$fornecedor) {
                return response()->json([
                    'error' => 'Fornecedor não encontrado.'
                ], 404);
            }
            $fornecedor->update([
                "nome" => $req->nome,
                "npj" => $req->cnpj,
                "telefone" => $req->telefone,
                "celular" => $req->celular,
                "endereco" => $req->endereco,
                "cidade" => $req->cidade,
                "estado" => $req->estado,

                "email" => $req->email,
                "password" => Hash::make($req->password),

                "cargo_id" => $req->cargo_id,
            ]);
            return response()->json([
                'message' => 'Fornecedor atualizado.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível atualizar fornecedor.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
