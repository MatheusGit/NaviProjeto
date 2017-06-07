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
            'name' => 'required|min:5|max:60|string',
            'email' => 'required|email|min:8|max:50|unique:logins,email',
            'password' => 'required|min:5|max:60',
            'confirm_password' => 'required|min:5|max:60|same:password',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'O campo email é de preenchimento obrigatório',
            'email.between' => 'O campo email deve ter tamanho minimo de :min e máximo de :max caracteres',
            'email.email' => 'O campo email deve possuir formato de email',
            'email.unique' => 'E-mail já cadastrado',
            'password.required' => 'O campo senha é de preenchimento obrigatório',
            'password.between' => 'O campo senha deve ter tamanho minimo de :min e máximo de :max caracteres',
            'confirm_password.required' => 'O campo confirma senha é de preenchimento obrigatório',
            'confirm_password.between' => 'O campo confirma senha deve ter tamanho minimo de :min e máximo de :max caracteres',
            'confirm_password.same' => 'O campo confirma senha deve ter o mesmo valor do campo senha',
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.string' => 'O campo nome não deve possuir números',
            'name.between' => 'O campo nome deve ter tamanho minimo de :min e máximo de :max caracteres',
        ];
    }   
}