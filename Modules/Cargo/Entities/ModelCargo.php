<?php

namespace Modules\Cargo\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

// use Modules\Cargo\Database\Factories\ModelCargoFactory;

class ModelCargo extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'cargo';

    protected $fillable = [
        'nome_cargo'
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
