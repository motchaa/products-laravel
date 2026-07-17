<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=> ['required', 'string'],
            'descricao' => ['required', 'string', 'max:100']
        ];
    }

    public function messages(): array {
        return [
            'descricao.required' => 'A descrição da categoria é obrigatória.',
            'descricao.max' => 'A descrição da categoria deve ter no máximo 100 caracteres.',
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.max' => 'O nome da categoria deve ter no máximo 50 caracteres.',
        ];
    }
}
