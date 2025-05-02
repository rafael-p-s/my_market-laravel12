<?php

namespace Modules\Produtos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Produtos\Database\Factories\ModelProdutosFactory;

class ModelProdutos extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'produtos.produtos';
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'codigo_barras',
        'categoria',
    ];
}
