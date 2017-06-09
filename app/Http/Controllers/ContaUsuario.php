<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\RegisterTwoFormRequest;
use App\login;
use Auth;

class ContaUsuario extends Controller
{
	
	private $logins;	
	public function __construct(login $login){
		$this->logins = $login;
	}

	public function login(LoginFormRequest $request){
		$credenciais = ["email" => $request->get('email'),"password" => $request->get('password')];
    	//dd(auth()->guard('usuarios')->attempt($credenciais));


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

    public function cadastrotwo(RegisterTwoFormRequest $request){
        
    } 

    public function logout(){
        Auth::guard('logins')->logout();
        return redirect()->route('login');
    }
}
