<?php

namespace Modules\Cargo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCargoRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'nome'=>'required|string|min:2|max:100',
            'setor'=>'required|string|min:2|max:100',
        ];
    }

    public function messages() {
        $message = 'O campo :atribute é obrigatório.';
        return [
            'nome.required'=>$message,
            'setor.required'=>$message,
        ];
    }

    // public function authorize(): bool
    // {
    //     return true;
    // }
}
