<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\DoencaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;


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

Route::get('/doencas/create',[DoencaController::class, 'create'])->name('doencas.create');
Route::post('/doencas/create',[DoencaController::class, 'store'])->name('doencas.store');

Route::get('/doencas/{id}/edit', [DoencaController::class, 'edit'])->name('doencas.edit');
Route::put('/doencas/{id}/edit', [DoencaController::class, 'update'])->name('doencas.update');

Route::get('/doencas/{id}', [DoencaController::class, 'destroy'])->name('doencas.destroy');

//Rotas do login
Route::get('/login',[LoginController::class, 'index'])->name('usuario.index');

Route::post('/login',[LoginController::class, 'login'])->name('usuario.login');

Route::get('/logout',[LoginController::class, 'logout'])->name('usuario.logout');

//Rotas de usuarios
Route::get('/usuario', [UsuariosController::class, 'show'])->name('usuarios.show');
Route::put('/usuario', [UsuariosController::class, 'update'])->name('usuarios.update');
