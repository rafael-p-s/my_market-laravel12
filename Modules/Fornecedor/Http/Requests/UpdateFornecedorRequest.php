<?php

namespace Modules\Fornecedor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome'=>'required|string|min:2|max:100',
            'cnpj' => 'required|min:10',
            'celular' => 'required|numeric|min:8',
            'cidade' => 'required|min:2',
            'estado' => 'required|min:2',
        ];
    }

    public function messages() {
        $obrigatorio = 'O campo :atribute é obrigatório';
        return [
            'nome.required'=>$obrigatorio,
            'cnpj.required'=>$obrigatorio,
            'celula.required'=>$obrigatorio,
            'cidade.required'=>$obrigatorio,
            'estado.required'=>$obrigatorio,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
