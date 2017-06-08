<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:5,60|string',
            'email' => 'required|email|between:8,50|unique:logins,email',
            'password' => 'required|between:5,60',
            'confirm_password' => 'required|between:5,60|same:password',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'O campo email é de preenchimento obrigatório',
            'email.email' => 'O campo email deve possuir formato de email',
            'email.unique' => 'E-mail já cadastrado',
            'password.required' => 'O campo senha é de preenchimento obrigatório',
            'password.between' => 'O campo senha deve ter tamanho minimo de :min e máximo de :max caracteres',
            'confirm_password.required' => 'O campo confirmar senha é de preenchimento obrigatório',
            'confirm_password.between' => 'O campo confirmar senha deve ter tamanho minimo de :min e máximo de :max caracteres',
            'confirm_password.same' => 'O campo confirmar senha deve ter o mesmo valor do campo senha',
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.string' => 'O campo nome não deve possuir números',
            'name.between' => 'O campo nome deve ter tamanho minimo de :min e máximo de :max caracteres',
        ];
    }   
}