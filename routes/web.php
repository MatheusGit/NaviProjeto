<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
	return "feliz?";
});

Route::group(['middleware' => 'AuthUsuario'],function(){
	Route::get('inicio',function(){
		return view('inicio');	
	})->name('inicio');

	Route::get('editar',function(){
		return view('editar');
	})->name('editar');

	Route::get('logout','ContaUsuario@logout')->name('sair');

	Route::post('imagem','CRUD@imagem')->name('imagem');
});

Route::group(['middleware' => 'NoAuthUsuario'],function(){
	Route::get('login',function(){
		return view('login');
	});

	Route::get('cadastro',function(){
		return view('register');
	});

	Route::get('cadastro/2-passo',function(){
		return redirect()->route('cadastro');
	});

	Route::post('cadastro','ContaUsuario@cadastro')->name('cadastro');

	Route::post('cadastro/2-passo','ContaUsuario@cadastrotwo')->name('cadastro_two');

	Route::post('login','ContaUsuario@login')->name('login');

});