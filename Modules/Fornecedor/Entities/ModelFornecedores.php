<?php

namespace Modules\Fornecedor\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Fornecedor\Database\Factories\ModelFornecedoresFactory;

class ModelFornecedores extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'estoque.fornecedores';
    protected $fillable = [
        'nome',
        'cnpj',
        'telefone',
        'celular',
        'cidade',
        'estado',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function produtos()
    {
        // Isso permite acessar $fornecedor->produtos diretamente e manter seu código limpo e desacoplado.
        return $this->hasMany(\Modules\Produtos\Entities\ModelProdutos::class, 'fornecedor_id');
    }
}
