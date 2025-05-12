<?php

namespace Modules\Cliente\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestCliente extends FormRequest
{
    public function rules():array{
        return [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:usuario.cliente,cpf',
            'telefone' => 'nullable|string',
            'celular' => 'required|string',
            'endereco' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'email' => 'required|email|unique:usuario.cliente,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
