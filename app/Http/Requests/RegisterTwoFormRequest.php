<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTwoFormRequest extends FormRequest
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
            'cpf' => 'required|between:11,11',
            'rg' => 'required|between:9,9',
            'datanasc' => 'required',
            'genero' => 'required',
            'outro' => 'string',
            'cep' => 'required',
            'numero' => 'numeric|min:0'
            'password' => 'required|between:5,60',
        ];
    }

    public function messages(){
        return [
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.between' => 'O campo CPF deve conter 11 dígitos',
            'rg.required' => 'O campo RG é obrigatório',
            'RG.between' => 'O campo RG deve conter 9 dígitos',
            'datanasc.required' => 'O campo Data de nascimento é obrigatório',
            'genero.required' => 'O campo Gênero é obrigatório',
            'outro.string' => 'O campo Qual gênero? deve possui apenas letras',
            'numero.numeric' => 'O campo Número deve conter apenas números',
            'password.required' =>  'O campo Senha é obrigatório',
            'password.between' => 'O campo Senha deve conter entre 5 e 60 caracteres',
        ];
    }
}