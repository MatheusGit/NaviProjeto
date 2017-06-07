<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoal extends Model
{
    protected $table = 'pessoal';

    protected $fillable = [
        'name', 'cpf', 'rg', 'datanasc', 'genero',
    ];

    public function login(){
    	return $this->belongTo('App/login');
    }
}
