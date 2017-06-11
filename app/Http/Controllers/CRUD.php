<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return redirect()->route('inicio');
    }

}
