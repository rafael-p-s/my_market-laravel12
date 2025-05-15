<?php

namespace Modules\Funcionario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequestFuncionario extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'sobrenome' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                Rule::unique('cliente', 'cpf')
            ],
            'telefone' => 'nullable|string',
            'celular' => 'required|string',
            'endereco' => 'required|string',
            'numero_casa' => 'required|integer',
            'complemento' => 'nullable|string|max:255',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('cliente', 'email')
            ],
            'password' => 'required|string|min:8|confirmed',
            'cargo_id' => 'required|numeric',
            'setor_id' => 'required|numeric',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
