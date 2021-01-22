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


// Principal =======================================================
Route::get('/', 'UserController@index')->name("user.index"); //Esto habría que cambiarlo por la vista de login cuando esté hecha.


// Usuarios ========================================================
Route::get('/usuarios', 'UserController@index')->name("user.index");
Route::get('/usuarios/nuevo', 'UserController@new')->name("user.new");
Route::post('/usuarios/almacenar', 'UserController@store')->name("user.store");
Route::get('/usuarios/editar/{id}', 'UserController@edit')->name("user.edit");
Route::get('/usuarios/borrar/{id}', 'UserController@destroy')->name("user.destroy");


// Parcelas ========================================================
Route::get('/parcelas','ParcelaController@index')->name("parcela.index");
Route::get('/parcelas/nuevo','ParcelaController@new')->name('parcela.new');
Route::get('/parcela/editar/{id}','ParcelaController@edit')->name('parcela.edit');
Route::get('/parcelas/borrar/{id}','ParcelaController@destroy')->name('parcela.destroy');