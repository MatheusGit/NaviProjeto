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
		return view('show');	
	})->name('inicio');

	Route::get('logout','ContaUsuario@logout')->name('logout');
});

	Route::group(['middleware' => 'NoAuthUsuario'],function(){
	Route::get('login',function(){
		return view('login');
	});

	Route::get('cadastro',function(){
		return view('register');
	});

	Route::post('cadastro','ContaUsuario@cadastro')->name('cadastro');

	Route::post('login','ContaUsuario@login')->name('login');

});