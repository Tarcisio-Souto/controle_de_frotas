<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

/* Colaboradores */
Route::get('/colaborador/cadastro', [UsersController::class, 'create'])->name('colaborador.cadastro');
Route::post('/colaborador/registrar', [UsersController::class, 'store']);
Route::get('/colaborador/lista', [UsersController::class, 'listarUsuarios'])->name('colaboradores.lista');
Route::get('/colaborador/visualizar/{id}', [UsersController::class, 'show'])->name('colaborador.mostrar');
Route::get('/colaborador/editar/{id}', [UsersController::class, 'edit'])->name('colaborador.editar');
Route::post('/colaborador/update/{id}', [UsersController::class, 'update'])->name('colaborador.atualizar');
Route::post('/colaborador/deletar/{id}', [UsersController::class, 'destroy'])->name('colaborador.deletar');


/* Empresas */

Route::get('/empresas/cadastro', [EmpresasController::class, 'create'])->name('empresas.cadastro');
Route::post('/empresas/registrar', [EmpresasController::class, 'store'])->name('empresas.registrar');