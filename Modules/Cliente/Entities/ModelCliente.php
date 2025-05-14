<?php

namespace Modules\Cliente\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ModelCliente extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'cliente';

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
