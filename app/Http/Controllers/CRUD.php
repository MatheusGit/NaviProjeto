<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DadosFormRequest;
use App\Pessoal;
use App\logins;
use Image;
use Auth;

class CRUD extends Controller
{
    
    private $dados;

    public function __construct(Pessoal $pessoal)
    {
        $this->dados = $pessoal;            
    }

    public function index()
    {
        $dados = $this->dados;

        return view('show')->with('dados');
    }

    public function imagem(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatar/'. $filename));
            $user = Auth::guard('logins')->user();
            $user->update(['avatar' => $filename]);
        }

        return redirect()
                ->back()
                ->withInput();
    }

    public function salvar(DadosFormRequest $request){
        $dataForm = $request->all();
        $dataForm['login_id'] = Auth::guard('logins')->user()->id;



        $info = Pessoal::where('login_id',Auth::guard('logins')->user()->id)->get()->first();

        if ($info == null){
            $this->create($request);
        }else{
            $this->update($request);
        }

        return redirect()->route('inicio');
    }

    public function create(Request $request){
        $dataForm = $request->all();
        $dataForm['login_id'] = Auth::guard('logins')->user()->id;

        $pessoal = new Pessoal;
        $insert = $pessoal->create($dataForm); 
    }

    public function update(Request $request){
        $dataForm = $request->all();
        $dataForm['login_id'] = Auth::guard('logins')->user()->id;

        $pessoal = Pessoal::where('login_id',Auth::guard('logins')->user()->id)->get()->first();
        $insert = $pessoal->update($dataForm);
    }  

    public function excluir(){
        $pessoal = Pessoal::where('login_id',Auth::guard('logins')->user()->id)->get()->first();
        $insert = $pessoal->delete();

        return redirect()->back();
    }

}
