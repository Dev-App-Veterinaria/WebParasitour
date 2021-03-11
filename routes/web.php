<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\DoencaController;


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

//Rota para a tela inicial
Route::view('/', 'principal/index')->name('index');

//Rotas de artigos
Route::get('/artigos', [ArtigoController::class, 'index'])->name('artigos.index');

Route::get('/artigos/create', [ArtigoController::class, 'create'])->name('artigos.create');
Route::post('/artigos/create', [ArtigoController::class, 'store'])->name('artigos.store');

Route::get('/artigos/{id}/edit', [ArtigoController::class, 'edit'])->name('artigos.edit');
Route::put('/artigos/{id}/edit', [ArtigoController::class, 'update'])->name('artigos.update');

Route::get('/artigos/{id}', [ArtigoController::class, 'destroy'])->name('artigos.destroy');

//Rotas de doenças
Route::get('/doencas',[DoencaController::class, 'index'])->name('doencas.index');
Route::get('/doencas/create',[DoencaController::class, 'create']);
Route::post('/doencas/create',[DoencaController::class, 'store'])->name('registrar');
