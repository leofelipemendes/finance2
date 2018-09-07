<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// -------login e auth
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'jwt.auth'], function(){
   Route::post('logout', 'AuthController@logout');
});
Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
Route::group(['middleware' => 'jwt.auth'], function(){
  Route::get('auth/user', 'AuthController@user');
});
// --------- end login e auth

Route::resource('departamento','DepartamentoController');
Route::resource('planocontas','PlanoContasController');
Route::resource('forn','FornecedorController');
Route::resource('clientes','ClientesController');
Route::resource('categoria','CategoriaController');
Route::resource('ccusto','CentroCustoController');


