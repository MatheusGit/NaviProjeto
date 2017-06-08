<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Authenticatable
{
    protected $fillable = [
        'email', 'password',
    ];

    public function pessoal(){
    	return $this->hasOne('App/Pessoal','login_id');
    }
}
