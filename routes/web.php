<?php

use App\Http\Controllers\AbastecimentosController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OficinasController;
use App\Http\Controllers\PostosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FabricantesController;
use App\Http\Controllers\ManutencoesController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\TrocasOleoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/* Autenticação */

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth', [AuthController::class, 'auth'])->name('auth.user');    

/* Logout */

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/* Home / Sobre / Contato */

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/about', [AboutController::class, 'index'])->middleware('auth');
Route::get('/contact', [ContactController::class, 'index'])->middleware('auth');

/* Colaboradores */

Route::get('/colaborador/cadastro', [UsersController::class, 'create'])->name('colaborador.cadastro')->middleware('auth');
Route::post('/colaborador/registrar', [UsersController::class, 'store'])->middleware('auth');
Route::get('/colaborador/lista', [UsersController::class, 'listarUsuarios'])->name('colaboradores.lista')->middleware('auth');
Route::get('/colaborador/visualizar/{id}', [UsersController::class, 'show'])->name('colaborador.mostrar')->middleware('auth');
Route::get('/colaborador/editar/{id}', [UsersController::class, 'edit'])->name('colaborador.editar')->middleware('auth');
Route::post('/colaborador/update/{id}', [UsersController::class, 'update'])->name('colaborador.atualizar')->middleware('auth');
Route::post('/colaborador/deletar/{id}', [UsersController::class, 'destroy'])->name('colaborador.deletar')->middleware('auth');

/* Empresas */

Route::get('/empresas/cadastro', [EmpresasController::class, 'create'])->name('empresas.cadastro')->middleware('auth');
Route::post('/empresas/registrar', [EmpresasController::class, 'store'])->name('empresas.registrar')->middleware('auth');
Route::get('/empresas/lista', [EmpresasController::class, 'index'])->name('empresas.lista')->middleware('auth');
Route::get('/empresa/visualizar/{id}', [EmpresasController::class, 'show'])->name('empresa.mostrar')->middleware('auth');
Route::get('/empresa/editar/{id}', [EmpresasController::class, 'edit'])->name('empresa.editar')->middleware('auth');
Route::post('/empresa/update/{id}', [EmpresasController::class, 'update'])->name('empresa.atualizar')->middleware('auth');
Route::post('/empresa/deletar/{id}', [EmpresasController::class, 'destroy'])->name('empresa.deletar')->middleware('auth');

/* Oficinas */

Route::get('/oficinas/cadastro', [OficinasController::class, 'create'])->name('oficinas.cadastro')->middleware('auth');
Route::post('/oficinas/registrar', [OficinasController::class, 'store'])->name('oficinas.registrar')->middleware('auth');
Route::get('/oficinas/lista', [OficinasController::class, 'index'])->name('oficinas.lista')->middleware('auth');
Route::get('/oficina/visualizar/{id}', [OficinasController::class, 'show'])->name('oficina.mostrar')->middleware('auth');
Route::get('/oficina/editar/{id}', [OficinasController::class, 'edit'])->name('oficina.editar')->middleware('auth');
Route::post('/oficina/update/{id}', [OficinasController::class, 'update'])->name('oficina.atualizar')->middleware('auth');
Route::post('/oficina/deletar/{id}', [OficinasController::class, 'destroy'])->name('oficina.deletar')->middleware('auth');

/* Postos */

Route::get('/postos/cadastro', [PostosController::class, 'create'])->name('postos.cadastro')->middleware('auth');
Route::post('/postos/registrar', [PostosController::class, 'store'])->name('postos.registrar')->middleware('auth');
Route::get('/postos/lista', [PostosController::class, 'index'])->name('postos.lista')->middleware('auth');
Route::get('/posto/visualizar/{id}', [PostosController::class, 'show'])->name('posto.mostrar')->middleware('auth');
Route::get('/posto/editar/{id}', [PostosController::class, 'edit'])->name('posto.editar')->middleware('auth');
Route::post('/posto/update/{id}', [PostosController::class, 'update'])->name('posto.atualizar')->middleware('auth');
Route::post('/posto/deletar/{id}', [PostosController::class, 'destroy'])->name('posto.deletar')->middleware('auth');

/* Fabricantes */

Route::get('/fabricantes/cadastro', [FabricantesController::class, 'create'])->name('fabricantes.cadastro')->middleware('auth');
Route::post('/fabricantes/registrar', [FabricantesController::class, 'store'])->name('fabricantes.registrar')->middleware('auth');
Route::get('/fabricantes/lista', [FabricantesController::class, 'index'])->name('fabricantes.lista')->middleware('auth');
Route::get('/fabricante/visualizar/{id}', [FabricantesController::class, 'show'])->name('fabricante.mostrar')->middleware('auth');
Route::get('/fabricante/editar/{id}', [FabricantesController::class, 'edit'])->name('fabricante.editar')->middleware('auth');
Route::post('/fabricante/update/{id}', [FabricantesController::class, 'update'])->name('fabricante.atualizar')->middleware('auth');
Route::post('/fabricante/deletar/{id}', [FabricantesController::class, 'destroy'])->name('fabricante.deletar')->middleware('auth');

/* Serviços */

Route::get('/servicos/cadastro', [ServicosController::class, 'create'])->name('servicos.cadastro')->middleware('auth');
Route::post('/servicos/registrar', [ServicosController::class, 'store'])->name('servicos.registrar')->middleware('auth');
Route::get('/servicos/lista', [ServicosController::class, 'index'])->name('servicos.lista')->middleware('auth');
Route::get('/servico/visualizar/{id}', [ServicosController::class, 'show'])->name('servico.mostrar')->middleware('auth');
Route::get('/servico/editar/{id}', [ServicosController::class, 'edit'])->name('servico.editar')->middleware('auth');
Route::post('/servico/update/{id}', [ServicosController::class, 'update'])->name('servico.atualizar')->middleware('auth');
Route::post('/servico/deletar/{id}', [ServicosController::class, 'destroy'])->name('servico.deletar')->middleware('auth');

/* Manutenções */

Route::get('/manutencoes/cadastro', [ManutencoesController::class, 'create'])->name('manutencoes.cadastro')->middleware('auth');
Route::post('/manutencoes/registrar', [ManutencoesController::class, 'store'])->name('manutencoes.registrar')->middleware('auth');
Route::get('/manutencoes/lista', [ManutencoesController::class, 'index'])->name('manutencoes.lista')->middleware('auth');
Route::get('/manutencao/visualizar/{id}', [ManutencoesController::class, 'show'])->name('manutencao.mostrar')->middleware('auth');
Route::get('/manutencao/editar/{id}', [ManutencoesController::class, 'edit'])->name('manutencao.editar')->middleware('auth');
Route::post('/manutencao/update/{id}', [ManutencoesController::class, 'update'])->name('manutencao.atualizar')->middleware('auth');
Route::post('/manutencao/deletar/{id}', [ManutencoesController::class, 'destroy'])->name('manutencao.deletar')->middleware('auth');

/* Abastecimentos */

Route::get('/abastecimentos/cadastro', [AbastecimentosController::class, 'create'])->name('abastecimentos.cadastro')->middleware('auth');
Route::post('/abastecimentos/registrar', [AbastecimentosController::class, 'store'])->name('abastecimentos.registrar')->middleware('auth');
Route::get('/abastecimentos/lista', [AbastecimentosController::class, 'index'])->name('abastecimentos.lista')->middleware('auth');
Route::get('/abastecimento/visualizar/{id}', [AbastecimentosController::class, 'show'])->name('abastecimento.mostrar')->middleware('auth');
Route::get('/abastecimento/editar/{id}', [AbastecimentosController::class, 'edit'])->name('abastecimento.editar')->middleware('auth');
Route::post('/abastecimento/update/{id}', [AbastecimentosController::class, 'update'])->name('abastecimento.atualizar')->middleware('auth');
Route::post('/abastecimento/deletar/{id}', [AbastecimentosController::class, 'destroy'])->name('abastecimento.deletar')->middleware('auth');

/* Trocas de Óleo */

Route::get('/trocas-oleo/cadastro', [TrocasOleoController::class, 'create'])->name('trocas-oleo.cadastro')->middleware('auth');
Route::post('/trocas-oleo/registrar', [TrocasOleoController::class, 'store'])->name('trocas-oleo.registrar')->middleware('auth');
Route::get('/trocas-oleo/lista', [TrocasOleoController::class, 'index'])->name('trocas-oleo.lista')->middleware('auth');
Route::get('/troca-oleo/visualizar/{id}', [TrocasOleoController::class, 'show'])->name('troca-oleo.mostrar')->middleware('auth');
Route::get('/troca-oleo/editar/{id}', [TrocasOleoController::class, 'edit'])->name('troca-oleo.editar')->middleware('auth');
Route::post('/troca-oleo/update/{id}', [TrocasOleoController::class, 'update'])->name('troca-oleo.atualizar')->middleware('auth');
Route::post('/troca-oleo/deletar/{id}', [TrocasOleoController::class, 'destroy'])->name('troca-oleo.deletar')->middleware('auth');


//Auth::routes();