<?php

namespace Modules\Produtos\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Categoria\Entities\ModelCategoria;
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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function categoria()
    {
        return $this->belongsTo(ModelCategoria::class, 'categoria_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(ModelFornecedores::class, 'fornecedor_id');
    }
}
