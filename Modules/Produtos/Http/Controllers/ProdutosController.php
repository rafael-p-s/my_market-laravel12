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
            $codigo = $req->codigo_barras ?? $this->gerarCodigoBarras($req);

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

    private function gerarCodigoBarras(StoreProdutosRequest $req): string
    {
        /* do {
            $codigo = str_pad(mt_rand(1, 9999999999999), 13, '0', STR_PAD_LEFT);
        } while (ModelProdutos::where('codigo_barras', $codigo)->exists());
        return $codigo; // EAN-13 fake */

        $categoriaId = (int) $req->categoria_id;

        $prefixos = [
            1 => '1000',
            2 => '2000',
            3 => '3000',
        ];

        // Caso não tenha em $prefixo, gera um padrão.
        $prefixo = $prefixos[$categoriaId] ?? '01000';

        do {
            $sufixo = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
            $codigo = $prefixo . $sufixo;
        } while (ModelProdutos::where('codigo_barras', $codigo)->exists());

        return $codigo;
    }

    // Lista
    public function read()
    {
        $produtos = ModelProdutos::with(['categoria', 'fornecedor'])->orderBy('id')->get();

        if ($produtos->isEmpty()) {
            return response()->json(['message' => 'Nenhum produto cadastrado.'], 204);
        }

        return response()->json($produtos, 200);
    }

    // Update
    public function update(Request $req, $id)
    {
        try {
            $produto = ModelProdutos::find($id);

            if (!$produto) {
                return response()->json([
                    'error' => 'Produto não encontrado.'
                ], 404);
            }

            $produto->nome = $req->nome;
            $produto->descricao = $req->descricao;
            $produto->preco = $req->preco;
            $produto->quantidade = $req->quantidade;

            if ($req->has('codigo_barras') && !empty($req->codigo_barras)) {
                $produto->codigo_barras = $req->codigo_barras;
            }

            $produto->categoria_id = $req->categoria_id;
            $produto->fornecedor_id = $req->fornecedor_id;


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
