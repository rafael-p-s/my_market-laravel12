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
            'preco' => 'required|numeric',
            'quantidade' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'fornecedor_id' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'nome.required' => 'O campo :atribute é obrigatório.',
            'preco.required' => 'O campo :atribute está incorreto, verificar.',
            'quantidade.required' => 'A quantidade deve ser maior que 1.',
            'categoria_id.required' => 'A :atribute deve ser marcada.',
            'fornecedor_id.required' => 'O :atribute deve ser marcado.'
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
