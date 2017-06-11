<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoal extends Model
{
    protected $table = 'pessoal';

    protected $fillable = [
		'cpf', 'rg', 'datanasc', 'genero', 'numero', 'cep','complemento',
    ];

    public function login(){
    	return $this->belongTo('App/login','login_id');
    }
}
