<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosFormRequest extends FormRequest
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
            'cpf' => 'nullable|between:14,14',
            'rg' => 'nullable|between:11,11',
            'datanasc' => 'nullable',
            'genero' => 'nullable',
            'outro' => 'nullable | string',
            'cep' => 'nullable',
            'numero' => 'nullable|numeric|min:0'
        ];
    }

    public function messages(){
        return [
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.between' => 'O campo CPF deve conter 14 dígitos',
            'rg.required' => 'O campo RG é obrigatório',
            'RG.between' => 'O campo RG deve conter 11 dígitos',
            'outro.string' => 'O campo Qual gênero? deve possui apenas letras',
            'numero.numeric' => 'O campo Número deve conter apenas números',
        ];
    }
}
