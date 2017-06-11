<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoal extends Model
{
    protected $table = 'pessoal';

    protected $fillable = [
		'cpf', 'rg', 'datanasc', 'genero', 'numero', 'cep','complemento', 'login_id', 'outro', 
		'genero_select', 'complemento_select',
    ];
    
    public function logint(){
    	return $this->belongsTo('App/login');
    }
    
}
