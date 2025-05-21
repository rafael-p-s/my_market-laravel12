<?php

namespace Modules\Produto\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Produto\Entities\ModelProduto;

class ProdutoController extends Controller
{
    public function create(Request $req)
    {
        try {
            $codigoBarras = $req->codigo_barras ?? $this->gerarCodigoBarras($req);
            $produto = ModelProduto::create([
                'funcionario_id'   => $req->funcionario_id,
                'fornecedor_id'    => $req->fornecedor_id,
                'codigo_barras'    => $codigoBarras,
                'nome_produto'     => $req->nome_produto,
                'quantidade'       => $req->quantidade,
                'categoria_id'        => $req->categoria_id,
                'tipo_medida'      => $req->tipo_medida,
                'preco'            => $req->preco,
                'perecivel'        => $req->perecivel,
                'data_fabricacao' => $req->data_fabricacao,
                'data_validade' => $req->data_validade
            ]);
            return response()->json([
                'message' => 'Produto cadastrado com sucesso!',
                'produto' => $produto
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível cadastrar o produto.',
                'details' => $e->getMessage()
            ], 500);
        }
    }
    // Ideia orinal:
    /* public function gerarCodigoBarras(Request $req): string {
        $categoria = (string) $req->categoria;

        $prefixos = [
            'frutas' => '1000',
            'limpeza' => '2000',
            'padaria' => '10000',
        ];
        

        $prefixo = $prefixos[$categoria] ?? '99999';
        do{
            $sufixo = str_pad(strval(random_int(0, 999999)), 8, '0', STR_PAD_LEFT);
            $codigo = $prefixo . $sufixo;
        } while (ModelProduto::where('codigo_barras', $codigo)->exists());

        return $codigo;
    } */

    public function gerarCodigoBarras(Request $req): string
    {
        $categoriaId = (int) $req->categoria_id;

        $prefixo = $categoriaId * 1000;

        do {
            $sufixo = str_pad(strval(random_int(0, 999999)), 8, '0', STR_PAD_LEFT);
            $codigo = $prefixo . $sufixo;
        } while (ModelProduto::where('codigo_barras', $codigo)->exists());

        return $codigo;
    }

    public function read()
    {
        $produto = ModelProduto::orderBy('id')->get();
        if ($produto->isEmpty()) {
            return response()->json(['message' => "Nenhum produto encontrado."], 404);
        }

        return response()->json($produto, 200);
    }

    public function findProduto($nome_produto)
    {
        $produto = ModelProduto::where('nome_produto', $nome_produto)->first();

        if (!$produto) {
            return response()->json(['message' => "$nome_produto não encontrado."], 404);
        }
        return response()->json($produto, 200);
    }

    public function update(Request $req, $id)
{
    try {
        $produto = ModelProduto::find($id);

        if (!$produto) {
            return response()->json([
                'error' => 'Produto não encontrado.'
            ], 404);
        }
        // Can't change de "funcionario_id"
        if ($req->has('fornecedor_id')) $produto->fornecedor_id = $req->fornecedor_id;
        if ($req->has('codigo_barras') && !empty($req->codigo_barras)) $produto->codigo_barras = $req->codigo_barras;
        if ($req->has('nome_produto')) $produto->nome_produto = $req->nome_produto;
        if ($req->has('quantidade')) $produto->quantidade = $req->quantidade;
        if ($req->has('categoria_id')) $produto->categoria_id = $req->categoria_id;
        if ($req->has('tipo_medida')) $produto->tipo_medida = $req->tipo_medida;
        if ($req->has('preco')) $produto->preco = $req->preco;
        if ($req->has('perecivel')) $produto->perecivel = $req->perecivel;
        if ($req->has('data_fabricacao')) $produto->data_fabricacao = $req->data_fabricacao;
        if ($req->has('data_validade')) $produto->data_validade = $req->data_validade;

        $produto->save();

        return response()->json([
            'message' => 'Produto atualizado.',
            // 'produto' => $produto
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Não foi possível atualizar produto.',
            'details' => $e->getMessage()
        ], 500);
    }
}
}
