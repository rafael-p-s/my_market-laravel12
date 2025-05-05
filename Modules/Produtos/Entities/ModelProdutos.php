<?php

namespace Modules\Produtos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Fornecedor\Entities\ModelFornecedores;

class ModelProdutos extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'estoque.produtos';
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade',
        'codigo_barras',
        'categoria_id',
        'fornecedor_id',
    ];

    public function categoria()
    {
        return $this->belong(Categoria::class, 'categoria_id');
    }

    public function fornecedor()
    {
        return $this->belong(ModelFornecedores::class, 'fornecedor_id');
    }
}
