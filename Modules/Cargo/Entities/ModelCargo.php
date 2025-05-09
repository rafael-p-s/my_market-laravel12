<?php

namespace Modules\Cargo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Cargo\Database\Factories\ModelCargoFactory;

class ModelCargo extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'usuario.cargo';
    protected $fillable = [
        'nome',
        'setor_id'
    ];

    protected $hidden = [
        'created_at',
        'update_at',
    ];

    public function setor () {
        return $this->belongsTo(ModelSetor::class, 'setor_id');
    }
}
