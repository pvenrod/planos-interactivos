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


// Principal ======================================================
Route::get('/','PrincipalController@index')->name('principal.index');
Route::get('/sobre-nosotros','PrincipalController@about')->name('principal.about');


// Login  ==========================================================
Route::get('/auth', 'AuthController@index')->name("auth.index");
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
Route::get('/zonas/ver/{id}','ZonaController@show')->name("zona.show");
Route::get('/zonas/crear','ZonaController@create')->name('zona.create')->middleware('userauth');
Route::post('/zonas/almacenar', 'ZonaController@store')->name("zona.store")->middleware('userauth');
Route::get('/zonas/editar/{id}','ZonaController@edit')->name('zona.edit')->middleware('userauth');
Route::post('/zonas/editar/{id}', 'ZonaController@update')->name("zona.update")->middleware('userauth');
Route::get('/zonas/borrar/{id}','ZonaController@destroy')->name('zona.destroy')->middleware('userauth');


// Multimedia ====================================================
Route::get('/multimedia/{id}','MultimediaController@index')->name('multimedia.index')->middleware('userauth'); // El ID es de la parcela que queremos visualizar su multimedia.
Route::get('/multimedia/crear/{id}','MultimediaController@create')->name('multimedia.create')->middleware('userauth'); // El ID es de la parcela.
Route::post('/multimedia/almacenar/{id}','MultimediaController@store')->name('multimedia.store')->middleware('userauth'); // El ID es de la parcela.
Route::get('/multimedia/editar/{id}','MultimediaController@edit')->name('multimedia.edit')->middleware('userauth');
Route::post('/multimedia/editar/{id}','MultimediaController@update')->name('multimedia.update')->middleware('userauth');
Route::get('/multimedia/borrar/{id}','MultimediaController@destroy')->name('multimedia.destroy')->middleware('userauth');