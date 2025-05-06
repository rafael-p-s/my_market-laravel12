<?php

namespace Modules\Categoria\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoriaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome'=>'required|string|min:2|max:100',
            'tipo'=>'required|string|min:1|max:100',
            'perecivel'=>'required|boolean',
        ];
    }

    public function messages()
    {
        $obrigatorio = 'O campo :attribute é obrigatório.';
        return [
            'nome.required' => $obrigatorio,
            'tipo.required' => $obrigatorio,
            'perecivel.required' => $obrigatorio
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
