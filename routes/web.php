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
Route::get('/', 'AuthController@index')->name("auth.index"); // Para cambiar por la vista principal de la aplicación
Route::post('/login', 'AuthController@login')->name("auth.login");
Route::post('/logout', 'AuthController@logout')->name("auth.logout")->middleware('userauth');
Route::get('/denied','AuthController@denied')->name("auth.denied");  

// Usuarios ========================================================
Route::get('/usuarios', 'UserController@index')->name("user.index")->middleware('userauth');
Route::get('/usuarios/crear', 'UserController@create')->name("user.create")->middleware('userauth');
Route::post('/usuarios/almacenar', 'UserController@store')->name("user.store")->middleware('userauth');
Route::get('/usuarios/editar/{id}', 'UserController@edit')->name("user.edit")->middleware('userauth');
Route::post('/usuarios/editar/{id}', 'UserController@update')->name("user.update")->middleware('userauth');
Route::get('/usuarios/borrar/{id}', 'UserController@destroy')->name("user.destroy")->middleware('userauth');


// Parcelas ========================================================
Route::get('/parcelas','ParcelaController@index')->name("parcela.index")->middleware('userauth');
Route::get('/parcelas/crear','ParcelaController@create')->name('parcela.create')->middleware('userauth');
Route::post('/parcelas/almacenar', 'ParcelaController@store')->name("parcela.store")->middleware('userauth');
Route::get('/parcelas/editar/{id}','ParcelaController@edit')->name('parcela.edit')->middleware('userauth');
Route::post('/parcelas/editar/{id}', 'ParcelaController@update')->name("parcela.update")->middleware('userauth');
Route::get('/parcelas/borrar/{id}','ParcelaController@destroy')->name('parcela.destroy')->middleware('userauth');


// Zonas ========================================================
Route::get('/zonas','ZonaController@index')->name("zona.index")->middleware('userauth');
Route::get('/zonas/crear','ZonaController@create')->name('zona.create')->middleware('userauth');
Route::post('/zonas/almacenar', 'ZonaController@store')->name("zona.store")->middleware('userauth');
Route::get('/zonas/editar/{id}','ZonaController@edit')->name('zona.edit')->middleware('userauth');
Route::post('/zonas/editar/{id}', 'ZonaController@update')->name("zona.update")->middleware('userauth');
Route::get('/zonas/borrar/{id}','ZonaController@destroy')->name('zona.destroy')->middleware('userauth');