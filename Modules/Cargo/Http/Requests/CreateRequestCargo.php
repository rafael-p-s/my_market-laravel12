<?php

namespace Modules\Cargo\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestCargo extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome_cargo' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
