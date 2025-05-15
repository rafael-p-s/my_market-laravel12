<?php

namespace Modules\Setor\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestSetor extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome_setor' => 'required|string|max:225',
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
