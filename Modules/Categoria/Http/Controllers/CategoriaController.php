<?php

namespace Modules\Categoria\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Categoria\Entities\ModelCategoria;

class CategoriaController extends Controller
{
    public function create(Request $req)
    {
        try {
            $categoria = ModelCategoria::create([
                'nome_categoria' => $req->nome_categoria,
            ]);
            return response()->json([
                'message' => 'Categoria criada com sucesso!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível cadastrar categoria.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function read()
    {
        $categoria = ModelCategoria::orderBy('id')->get();
        if ($categoria->isEmpty()) {
            return response()->json(['message' => 'Nenhuma categoria encontrada.'], 404);
        }
        return response()->json($categoria, 200);
    }

    public function update(Request $req, $id)
    {
        try {
            $categoria = ModelCategoria::find($id);
            if (!$categoria) {
                return response()->json([
                    'error' => "Categoria não encontrada."
                ], 404);
            }

            $categoria->update([
                'nome_categoria' => $req->nome_categoria,
            ]);

            return response()->json(['message' => 'Categoria atualizado'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível atualizar categoria.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
