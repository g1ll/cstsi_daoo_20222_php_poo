<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $isRequired = $this->isMethod('post');

        return [
            'name'      => $isRequired ? 'required' : 'nullable' . ' | string | max:255 | min:5',
            'email'     => $isRequired ? 'required' : 'nullable' . ' | email | unique:users',
            'password'  => $isRequired ? 'required' : 'nullable' . ' | string | min:8',
            'idade'     => $isRequired ? 'required' : 'nullable' . ' | numeric | min:18 | max:100',
            'is_admin'  => 'nullable | boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.require'      => 'O nome é obrigatório!!',
            'name.max'          => 'O nome deve ter nomáximo 50 caracteres!',
            'email.require'     => 'O email é obrigatório!!',
            'email.email'       => 'Informe um email válido!',
            'email.unique'      => 'Email indiponível, cadastre outro email.',
            'password.min'      => 'A senha deve ter no mínimo oito caracteres!',
            'password.require'  => 'A senha é obrigatória!!',
            'idade.require'     => 'A idade é obrigatórioa!!'
        ];
    }
}
