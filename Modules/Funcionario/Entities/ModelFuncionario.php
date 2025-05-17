<?php

namespace Modules\Funcionario\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

// use Modules\Funcionario\Database\Factories\ModelFuncionarioFactory;

class ModelFuncionario extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'funcionario';

    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'telefone',
        'celular',
        'endereco',
        'numero_casa',
        'complemento',
        'cidade',
        'estado',
        'email',
        'password',
        'cargo_id',
        'setor_id',
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
