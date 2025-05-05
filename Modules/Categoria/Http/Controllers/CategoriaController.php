<?php

namespace Modules\Categoria\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Categoria\Entities\ModelCategoria;
use Modules\Categoria\Http\Requests\StoreCategoriaRequest;
use Modules\Categoria\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    public function create(StoreCategoriaRequest $req)
    {
        try {
            $categoria = ModelCategoria::create([
                'nome' => $req->nome,
                'tipo' => $req->tipo,
                'perecivel' => $req->perecivel,
            ]);

            return response()->json(['message' => 'Categoria cadastrada.'], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao cadastrar categoria.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $categoria = ModelCategoria::orderBy('id')->get();
        if ($categoria->isEmpty()) {
            return response()->json(['message' => 'Nenhuma categoria encontrada.']);
        }

        return response()->json($categoria, 200);
    }

    public function update(UpdateCategoriaRequest $req, $id)
    {
        try {
            $categoria = ModelCategoria::find($id);
            if (!$categoria) {
                return response()->json([
                    'error' => 'Categoria não encontrada.'
                ], 404);
            }

            $categoria->update([
                'nome' => $req->nome,
                'tipo' => $req->tipo,
                'perecivel' => $req->perecivel
            ]);

            return response()->json(['message' => 'Categoria atualizada.'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao atualizar categoria.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function delete(Request $req, $id)
    {
        $categoria = ModelCategoria::find($id);
        if (!$categoria) {
            return response()->json([
                'error' => 'Categoria não encontrada.'
            ], 404);
        }

        $categoria->delete();

        return response()->json(['message' => 'Categoria deletada com sucesso.'], 200);
    }
}
