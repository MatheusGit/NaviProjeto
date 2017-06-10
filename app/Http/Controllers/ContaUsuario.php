<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\RegisterTwoFormRequest;
use App\login;
use App\Pessoal;
use validate;
use Auth;

class ContaUsuario extends Controller
{
	
	private $logins;	
	public function __construct(login $login){
		$this->logins = $login;
	}

	public function login(LoginFormRequest $request){
		$credenciais = ["email" => $request->get('email'),"password" => $request->get('password')];
    	
    	if(Auth::guard('logins')->attempt($credenciais)){
    		return redirect()->route('inicio');
    	}else{
    		return redirect()
    				->back()
    				->withErrors(['errors' => 'login invalido'])
    				->withInput($request->except('password'));
    	}
	}   

	public function cadastro(RegisterFormRequest $request){
		$senha = $request->get('password');
    	$dataForm = $request->all();
    	$dataForm['password'] = bcrypt($senha);    
    	$insert = $this->logins->create($dataForm);

        if($insert){
            if($dataForm['botao'] == 'cadastro'){
                return redirect()->route('login');
            }else if($dataForm['botao'] == 'passo'){
                return view('register_two',['name' => $dataForm['name'],'email' => $dataForm['email'] ]);
            }            
        }else{
                return redirect()
                        ->back();  
            } 
	} 

    public function cadastrotwo(Request $request){
        $rules = [
           // 'cpf' => 'required|between:11,11',
           // 'rg' => 'required|between:8,10',
            'datanasc' => 'required',
            'genero' => 'required',
            'outro' => 'string',
            'cep' => 'required',
            'numero' => 'numeric|min:0',
            'password' => 'required|between:5,60',
        ];

        $messages = [
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

        $validate = validator($request->all(), $rules,$messages);


        if($validate->fails() ){
            return $validate;
        }

        return 'validou';
    } 

    public function logout(){
        Auth::guard('logins')->logout();
        return redirect()->route('login');
    }
}
