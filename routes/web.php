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
    return view('doencas');
});

Route::get('/doencas/create', 'DoencaController@create')->name('doencas.create');
Route::post('/doencas/create', 'DoencaController@store')->name('doencas.store');
Route::get('/doencas', 'DoencaController@index')->name('doencas.index');
Route::get('/doencas/{id}', 'DoencaController@destroy')->name('doencas.destroy');