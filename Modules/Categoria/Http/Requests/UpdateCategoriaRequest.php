<?php

namespace Modules\Categoria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:2|max:100',
            'tipo' => 'required|string|min:1|max:100',
            'perecivel' => 'required|boolean',
        ];
    }

    public function messages()
    {
        $obrigatorio = 'O campo :atribute é obrigatório.';
        return [
            'nome.required' => $obrigatorio,
            'tipo.required' => $obrigatorio,
            'perecivel.required' => $obrigatorio
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
