<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        $productId = $this->route('id') ?? $this->route('produto');
        
        return [
            'nome' => ['required', 'string'],
            'descricao' => ['required', 'string'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'codigo' => ['required', 'string', 'unique:products,codigo,' . $productId],
            'valor' => ['required', 'numeric', 'gt:0'],
            'quantidade' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'descricao.required' => 'A descrição é obrigatória.',
            'categoria_id.required' => 'A categoria é obrigatória.',
            'categoria_id.exists' => 'A categoria selecionada é inválida.',
            'codigo.required' => 'O código é obrigatório.',
            'codigo.unique' => 'Este código já está cadastrado em outro produto.',
            'valor.required' => 'O valor é obrigatório.',
            'valor.gt' => 'O valor deve ser maior que zero.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
        ];
    }
}
