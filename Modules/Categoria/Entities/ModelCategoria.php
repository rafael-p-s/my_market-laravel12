<?php

namespace Modules\Categoria\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Categoria\Database\Factories\ModelCategoriaFactory;

class ModelCategoria extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'estoque.categorias';
    protected $fillable = [
        'nome',
        'tipo',
        'perecivel',
    ];

    public function produtos()
    {
        return $this->hasMany(\Modules\Produtos\Entities\ModelProdutos::class, 'categoria_id');
    }
}
