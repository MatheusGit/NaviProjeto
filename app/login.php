<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function pessoal(){
    	return $this->hasOne('App/Pessoal','login_id');
    }
}
