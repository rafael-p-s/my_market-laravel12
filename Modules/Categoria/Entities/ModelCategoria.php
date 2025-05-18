<?php

namespace Modules\Categoria\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class ModelCategoria extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'categoria';

    protected $fillable = [
        'nome_categoria'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
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
