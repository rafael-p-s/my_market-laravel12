<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuariosRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'nome' => 'request|string|min:6|max:100',
            'sobrenome' => 'request|string|min:6|max:100',
            'cpf' => 'request|string|',
            'celular' => 'required|numeric|min:19',
            'endereco' => 'required|min:2',
            'cidade' => 'required|min:2',
            'estado' => 'required|min:2',
            'funcionario' => 'required|boolean',
            'cargo_id' => 'required|numeric',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|string|min:8',

        ];
    }

    public function messages()
    {
        $message = 'O campo :atribute é obrigatório';

        return [
            'nome.required' => $message,
            'sobrenome.required' => $message,
            'cpf.required' => $message,
            'celular.required' => $message,
            'celular.required' => $message,
            'endereco.required' => $message,
            'cidade.required' => $message,
            'estado.required' => $message,
            'cargo_id.required' => $message,
            'funcionario.required' => $message,
            'email.required' => $message,
            'password.required' => $message,
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
