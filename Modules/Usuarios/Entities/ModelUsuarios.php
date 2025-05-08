<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Usuarios\Database\Factories\ModelUsuariosFactory;

class ModelUsuarios extends Model
{
    use HasFactory;

    protected $connetion = 'pgsql';
    protected $table = 'usuario.usuarios';
    protected $fillable = [
        'nome',
        'sobrenome',
        'cpf',
        'telefone',
        'celular',
        'endereco',
        'cidade',
        'estado',
        'funcionario',
        'cargo_id',
        'email',
        'password',
        'tipo_cargo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cargo()
    {
        return $this->belongsTo(ModelCargo::class, 'cargo_id');
    }
}
