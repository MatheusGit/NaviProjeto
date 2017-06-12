<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\DadosFormRequest;
use App\login;
use App\Pessoal;
use validate;
use Auth;
use View;
use Crypt;

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
            
                return redirect()->route('loginget');
            }else if($dataForm['botao'] == 'passo'){
                return view('register_two',['name' => $dataForm['name'],'email' => $dataForm['email'], 'password' => $dataForm['password'], ]);
            }            
        }else{
                return redirect()
                        ->back();  
            } 
	} 

    public function cadastrotwo(DadosFormRequest $request){
        /*
        $dataForm = $request->all();
        $login = login::where('email',$dataForm['email']);
        $senha = decryptString($dataForm['senhab']);
        if($dataForm['password'] == $senha){
            $dataForm = $request->all();

            $dataForm['login_id'] = 

            if(isset($dataForm['genero_select']) && $dataForm['genero_select'] != "Outro"){
                $dataForm['outro'] = null;
            }

            if(isset($dataForm['complemento_select']) && $dataForm['complemento_select'] == "Nao"){
                $dataForm['complemento'] = null;
            }

            if(isset($dataForm['cep']) && $dataForm['cep'] == null || $dataForm['cep'] == ''){
                $dataForm['numero'] = null;
                $dataForm['complemento_select'] = null;
                $dataForm['complemento'] = null;
            }    

            $dataForm = $request->all();
            $dataForm['login_id'] = 

            $pessoal = new Pessoal;
            $insert = $pessoal->create($dataForm);     

            return view('login');
        }{
            return view('register_two');
        }
        */
        return "<h1> Cadastro passo 2 não implementado! </h1>";

    } 

    public function logout(){
        Auth::guard('logins')->logout();
        return redirect()->route('login');
    }
}
