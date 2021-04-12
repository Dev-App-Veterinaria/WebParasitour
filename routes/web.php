<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\DoencaController;
use App\Http\Controllers\UsuarioController;
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
Route::get('/login',[UsuarioController::class, 'index'])->name('usuario.index');

Route::post('/login',[UsuarioController::class, 'login'])->name('usuario.login');

Route::get('/logout',[UsuarioController::class, 'logout'])->name('usuario.logout');

//Rotas de usuarios
Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/create', [UsuariosController::class, 'store'])->name('usuarios.store');

Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}/edit', [UsuariosController::class, 'update'])->name('usuarios.update');

Route::get('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');