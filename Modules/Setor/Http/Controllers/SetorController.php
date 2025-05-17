<?php

namespace Modules\Setor\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Setor\Entities\ModelSetor;
use Modules\Setor\Http\Requests\CreateRequestSetor;

class SetorController extends Controller
{
    public function create(CreateRequestSetor $req)
    {
        try {
            $setor = ModelSetor::create([
                'nome_setor' => $req->nome_setor,
            ]);

            return response()->json([
                'message' => 'Setor criado com sucesso!.'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao criar setor.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $setor = ModelSetor::orderBy('id')->get();
        if ($setor->isEmpty()) {
            return response()->json(['message' => 'Nenhum setor encontrado.'], 404);
        }

        return response()->json([$setor, 200]);
    }

    public function findSetor($nome_setor)
    {
        $setor = ModelSetor::where('nome_setor', $nome_setor)->first();
        if (!$setor) {
            return response()->json(['message' => "Cargo {$nome_setor} não encontrado."], 404);
        }

        return response()->json($setor, 200);
    }

    public function update(Request $req, $id)
    {
        try {
            $setor = ModelSetor::find($id);
            if (!$setor) {
                return response()->json([
                    'error' => "Setor não encontrado."
                ], 404);
            }

            $setor->update([
                'nome_setor' => $req->nome_setor,
            ]);

            return response()->json([
                'message' => 'Setor atualizado com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível atualizar setor.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
