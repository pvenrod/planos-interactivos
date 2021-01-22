<?php

use Illuminate\Support\Facades\Route;

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


// Login  ==========================================================
Route::get('/', 'AuthController@index')->name("auth.index"); 
Route::get('/login', 'AuthController@login')->name("auth.login"); 

// Usuarios ========================================================
Route::get('/usuarios', 'UserController@index')->name("user.index");
Route::get('/usuarios/crear', 'UserController@create')->name("user.create");
Route::post('/usuarios/almacenar', 'UserController@store')->name("user.store");
Route::get('/usuarios/editar/{id}', 'UserController@edit')->name("user.edit");
Route::post('/usuarios/editar/{id}', 'UserController@update')->name("user.update");
Route::get('/usuarios/borrar/{id}', 'UserController@destroy')->name("user.destroy");


// Parcelas ========================================================
Route::get('/parcelas','ParcelaController@index')->name("parcela.index");
Route::get('/parcelas/crear','ParcelaController@create')->name('parcela.create');
Route::post('/parcelas/almacenar', 'ParcelaController@store')->name("parcela.store");
Route::get('/parcelas/editar/{id}','ParcelaController@edit')->name('parcela.edit');
Route::post('/parcelas/editar/{id}', 'ParcelaController@update')->name("parcela.update");
Route::get('/parcelas/borrar/{id}','ParcelaController@destroy')->name('parcela.destroy');
