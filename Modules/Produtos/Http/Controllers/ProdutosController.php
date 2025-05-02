<?php

namespace Modules\Produtos\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Produtos\Entities\ModelProdutos;

class ProdutosController extends Controller
{
    // Cadastro
    public function create(Request $req)
    {
        ModelProdutos::create([
            "nome" => $req->nome,
            "descricao" => $req->descricao,
            "preco" => $req->preco,
            "quantidade" => $req->quantidade,
            "codigo_barras" => $req->codigo_barras,
            "categoria" => $req->categoria
        ]);

        return response("Producot cadastrado", 200);
    }

     // Lista
     public function read()
     {
         return response()->json(ModelProdutos::orderBy('id')->get(), 200);
     }

    // Update
    public function update(Request $req)
    {
        $produto = ModelProdutos::find($req->id);

        $produto->nome = $req->nome;
        $produto->descricao = $req->descricao;
        $produto->preco = $req->preco;
        $produto->quantidade = $req->quantidade;
        $produto->codigo_barras = $req->codigo_barras;
        $produto->categoria = $req->categoria;

        $produto->save();

        return response("Produto atualizado!", 200);
    }

    // Delete
    public function delete(Request $req) {
        $produto = ModelProdutos::find($req->id);

        $produto->delete();

        return response("Produto deletado com sucesso!", 200);
    }
}
