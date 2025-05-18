<?php

namespace Modules\Fornecedor\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ModelFornecedor extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'fornecedor';

    protected $fillable = [
        'nome',
        'cnpj',
        'telefone',
        'celular',
        'endereco',
        'numero_casa',
        'complemento',
        'cidade',
        'estado',
        'email',
        'password',
        'cargo_id'
    ];

    protected $hidden = [
        'password',
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
