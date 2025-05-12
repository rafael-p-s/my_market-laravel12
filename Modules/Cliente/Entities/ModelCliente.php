<?php

namespace Modules\Cliente\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelCliente extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'usuario.cliente';
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'telefone',
        'celular',
        'endereco',
        'cidade',
        'estado',

        'email',
        'password',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
