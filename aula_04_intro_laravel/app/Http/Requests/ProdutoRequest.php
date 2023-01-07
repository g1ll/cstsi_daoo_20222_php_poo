<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $isRequired = $this->isMethod('POST')?'required':'nullable';
        return [
            'qtd_estoque' =>  $isRequired.' | min:1 | numeric ',
            'importado' => 'nullable | boolean'
        ];
    }

    public function messages()
    {
        return [
            'qtd_estoque'=>'Insira ao menos um produto no estoque!',
            'importado'=>'O campo importado deve ser booleano, usar 0 ou 1.'
        ];
    }
}
