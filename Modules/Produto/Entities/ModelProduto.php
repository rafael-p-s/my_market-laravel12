<?php

namespace Modules\Produto\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ModelProduto extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'produto';

    protected $fillable = [
        'funcionario_id',
        'fornecedor_id',
        'codigo_barras',
        'nome_produto',
        'quantidade',
        'categoria_id',
        'tipo_medida',
        'preco',
        'perecivel',
        'data_fabricacao',
        'data_validade'
    ];

    protected $hiddne = [
        'created_at',
        'updated_at',
    ];

     // Métodos exigidos por JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
