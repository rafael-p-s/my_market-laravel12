<?php

namespace Modules\Produtos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:2|max:100',
            'descricao'=> 'nullable|string|min:2|max:250',
            'preco' => 'required|numeric',
            'quantidade' => 'required|numeric|min:1',
            'categoria' => 'required|string|min:2|max:20',
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo :atribute é obrigatório.',
            'categoria.required' => 'O campo :atribute é obrigatório.',
            'preco.numeric' => 'O campo :atribute está incorreto, verificar.',
            'quantidade.numeric' => 'A quantidade deve ser maior que 1.'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    /* public function authorize(): bool
    {
        return true;
    } */
}
