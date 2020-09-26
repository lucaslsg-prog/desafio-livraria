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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false
]);

Route::prefix('restrito')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::namespace('Restrito')->name('restrito.')->group(function () {
        Route::resource('autors', 'AutorController');
        Route::resource('livros', 'LivroController');

        Route::get('lista-autores','AutorController@listaAutores')->name('lista.autores');
    });

}); 