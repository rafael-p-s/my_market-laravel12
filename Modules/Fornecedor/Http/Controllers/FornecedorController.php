<?php

namespace Modules\Fornecedor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Fornecedor\Entities\ModelFornecedores;
use Modules\Fornecedor\Http\Requests\StoreFornecedoresRequest;
use Modules\Fornecedor\Http\Requests\UpdateFornecedorRequest;

class FornecedorController extends Controller
{
    public function create(StoreFornecedoresRequest $req)
    {
        try {
            $fornecedor = ModelFornecedores::create([
                "nome" => $req->nome,
                "cnpj" => $req->cnpj,
                "telefone" => $req->telefone,
                "celular" => $req->celular,
                "cidade" => $req->cidade,
                "estado" => $req->estado,
            ]);
            return response()->json([
                'message' => "Produto fornecedor cadastrado!",
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao cadastrar fornecedor.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $fornecedor = ModelFornecedores::orderBy('id')->get();
        if ($fornecedor->isEmpty()) {
            return response()->json(['message' => "Nenhum fornecedor cadastrado."]);
        }

        return response()->json($fornecedor, 200);
    }

    public function update(UpdateFornecedorRequest $req)
    {
        try {
            $fornecedor = ModelFornecedores::find($req->id);

            if (!$fornecedor) {
                return response()->json([
                    'error' => "Fornecedor não encontrado."
                ], 404);
            }

           $fornecedor->update([
            'nome'=>$req->nome,
            'cnpj'=>$req->cnpj,
            'telefone'=>$req->telefone,
            'celular'=>$req->celular,
            'cidade'=>$req->cidade,
            'estado'=>$req->estado,            
           ]);

            return response()->json([
                'message' => 'Fornecedor atualizado.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao atualizar fornecedor.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $req)
    {
        $fornecedor = ModelFornecedores::find($req->id);

        if (!$fornecedor) {
            return response()->json([
                'error'=>'Fornecedor não encontrado.'
            ], 404);
        }
        $fornecedor->delete();

        return response()->json(['message'=>'Fornecedor deletado com sucesso.']);
    }
}
