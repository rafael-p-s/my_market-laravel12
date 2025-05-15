<?php

namespace Modules\Setor\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

// use Modules\Setor\Database\Factories\ModelSetorFactory;

class ModelSetor extends Authenticatable implements JWTSubject
{
    protected $connection = 'pgsql';
    protected $table = 'setor';

    protected $fillable = [
        'nome_setor'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKet();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}