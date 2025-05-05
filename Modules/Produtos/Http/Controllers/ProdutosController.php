<?php

namespace Modules\Produtos\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Produtos\Entities\ModelProdutos;

// Request
use Modules\Produtos\Http\Requests\StoreProdutosRequest;

class ProdutosController extends Controller
{
    // Cadastro
    public function create(StoreProdutosRequest $req)
    {
        try {
            $codigo = $req->codigo_barras ?? $this->gerarCodigoBarras();

            $produto = ModelProdutos::create([
                "nome" => $req->nome,
                "descricao" => $req->descricao,
                "preco" => $req->preco,
                "quantidade" => $req->quantidade,
                "codigo_barras" => $codigo,
                "categoria_id" => $req->categoria_id,
                "fornecedor_id" => $req->fornecedor_id,
            ]);

            return response()->json([
                'message' => 'Produto cadastrado com sucesso!',
                // 'produto' => $produto
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao cadastrar produto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    private function gerarCodigoBarras(): string
    {
        do {
            $codigo = str_pad(mt_rand(1, 9999999999999), 13, '0', STR_PAD_LEFT);
        } while (ModelProdutos::where('codigo_barras', $codigo)->exists());
        return $codigo; // EAN-13 fake
    }

    // Lista
    public function read()
    {
        // Está correto, mas pode melhorar
        // return response()->json(ModelProdutos::orderBy('id')->get(), 200);

        $produtos = ModelProdutos::orderBy('id')->get();
        if ($produtos->isEmpty()) {
            return response()->json(['message' => 'Nenhum produto cadastrado.'], 204);
        }

        // Retorna as relações já carregadas
        $produtos = ModelProdutos::with(['categoria', 'fornecedor'])->orderBy('id')->get();

        return response()->json($produtos, 200);
    }

    // Update
    public function update(Request $req)
    {
        try {
            $produto = ModelProdutos::find($req->id);

            if (!$produto) {
                return response()->json([
                    'error' => 'Produto não encontrado.'
                ], 404);
            }

            $produto->nome = $req->nome;
            $produto->descricao = $req->descricao;
            $produto->preco = $req->preco;
            $produto->quantidade = $req->quantidade;
            $produto->codigo_barras = $req->codigo_barras;
            $produto->categoria = $req->categoria;

            $produto->save();

            return response()->json([
                'message' => 'Produto atualizado.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao atualizar produto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    // Delete
    public function delete(Request $req)
    {
        $produto = ModelProdutos::find($req->id);

        if (!$produto) {
            return response()->json([
                'error' => 'Produto não encontrado.'
            ], 404);
        }

        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso!']);
    }
}
