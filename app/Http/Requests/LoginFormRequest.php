<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|email|min:8|max:50|exists:logins,email',
            'password' => 'required|min:5|max:60',
        ];
    }

    public function messages(){
        return[
            'email.required' => 'O campo email é de preenchimento obrigatório',
            'email.between' => 'O campo email deve ter tamanho minimo de :min e máximo de :max caracteres',
            'email.max' => 'O campo email deve ter tamanho máximo de :max caracteres',
            'email.min' => 'O campo email deve ter tamanho máximo de :min caracteres',
            'email.email' => 'O campo email deve possuir formato de email',
            'email.exists' => 'Email não cadastrado',
            'password.required' => 'O campo senha é de preenchimento obrigatório',
            'password.between' => 'O campo senha deve ter tamanho minimo de :min e máximo de :max caracteres',
            'password.max' => 'O campo senha deve ter tamanho máximo de :max caracteres',
            'password.min' => 'O campo senha deve ter tamanho máximo de :min caracteres',
        ];  
    }
}