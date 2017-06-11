<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class login extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];
    
    public function pessoalt(){
    	return $this->hasOne('App/Pessoal');
    }
    
}
