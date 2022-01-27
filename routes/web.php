<?php

use App\Http\Controllers\AbastecimentosController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OficinasController;
use App\Http\Controllers\PostosController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FabricantesController;
use App\Http\Controllers\ManutencoesController;
use App\Http\Controllers\ServicosController;
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
Route::get('/empresas/lista', [EmpresasController::class, 'index'])->name('empresas.lista');
Route::get('/empresa/visualizar/{id}', [EmpresasController::class, 'show'])->name('empresa.mostrar');
Route::get('/empresa/editar/{id}', [EmpresasController::class, 'edit'])->name('empresa.editar');
Route::post('/empresa/update/{id}', [EmpresasController::class, 'update'])->name('empresa.atualizar');
Route::post('/empresa/deletar/{id}', [EmpresasController::class, 'destroy'])->name('empresa.deletar');

/* Oficinas */

Route::get('/oficinas/cadastro', [OficinasController::class, 'create'])->name('oficinas.cadastro');
Route::post('/oficinas/registrar', [OficinasController::class, 'store'])->name('oficinas.registrar');
Route::get('/oficinas/lista', [OficinasController::class, 'index'])->name('oficinas.lista');
Route::get('/oficina/visualizar/{id}', [OficinasController::class, 'show'])->name('oficina.mostrar');
Route::get('/oficina/editar/{id}', [OficinasController::class, 'edit'])->name('oficina.editar');
Route::post('/oficina/update/{id}', [OficinasController::class, 'update'])->name('oficina.atualizar');
Route::post('/oficina/deletar/{id}', [OficinasController::class, 'destroy'])->name('oficina.deletar');

/* Postos */

Route::get('/postos/cadastro', [PostosController::class, 'create'])->name('postos.cadastro');
Route::post('/postos/registrar', [PostosController::class, 'store'])->name('postos.registrar');
Route::get('/postos/lista', [PostosController::class, 'index'])->name('postos.lista');
Route::get('/posto/visualizar/{id}', [PostosController::class, 'show'])->name('posto.mostrar');
Route::get('/posto/editar/{id}', [PostosController::class, 'edit'])->name('posto.editar');
Route::post('/posto/update/{id}', [PostosController::class, 'update'])->name('posto.atualizar');
Route::post('/posto/deletar/{id}', [PostosController::class, 'destroy'])->name('posto.deletar');

/* Fabricantes */

Route::get('/fabricantes/cadastro', [FabricantesController::class, 'create'])->name('fabricantes.cadastro');
Route::post('/fabricantes/registrar', [FabricantesController::class, 'store'])->name('fabricantes.registrar');
Route::get('/fabricantes/lista', [FabricantesController::class, 'index'])->name('fabricantes.lista');
Route::get('/fabricante/visualizar/{id}', [FabricantesController::class, 'show'])->name('fabricante.mostrar');
Route::get('/fabricante/editar/{id}', [FabricantesController::class, 'edit'])->name('fabricante.editar');
Route::post('/fabricante/update/{id}', [FabricantesController::class, 'update'])->name('fabricante.atualizar');
Route::post('/fabricante/deletar/{id}', [FabricantesController::class, 'destroy'])->name('fabricante.deletar');

/* Serviços */

Route::get('/servicos/cadastro', [ServicosController::class, 'create'])->name('servicos.cadastro');
Route::post('/servicos/registrar', [ServicosController::class, 'store'])->name('servicos.registrar');
Route::get('/servicos/lista', [ServicosController::class, 'index'])->name('servicos.lista');
Route::get('/servico/visualizar/{id}', [ServicosController::class, 'show'])->name('servico.mostrar');
Route::get('/servico/editar/{id}', [ServicosController::class, 'edit'])->name('servico.editar');
Route::post('/servico/update/{id}', [ServicosController::class, 'update'])->name('servico.atualizar');
Route::post('/servico/deletar/{id}', [ServicosController::class, 'destroy'])->name('servico.deletar');

/* Manutenções */

Route::get('/manutencoes/cadastro', [ManutencoesController::class, 'create'])->name('manutencoes.cadastro');
Route::post('/manutencoes/registrar', [ManutencoesController::class, 'store'])->name('manutencoes.registrar');
Route::get('/manutencoes/lista', [ManutencoesController::class, 'index'])->name('manutencoes.lista');
Route::get('/manutencao/visualizar/{id}', [ManutencoesController::class, 'show'])->name('manutencao.mostrar');
Route::get('/manutencao/editar/{id}', [ManutencoesController::class, 'edit'])->name('manutencao.editar');
Route::post('/manutencao/update/{id}', [ManutencoesController::class, 'update'])->name('manutencao.atualizar');
Route::post('/manutencao/deletar/{id}', [ManutencoesController::class, 'destroy'])->name('manutencao.deletar');

/* Abastecimentos */

Route::get('/abastecimentos/cadastro', [AbastecimentosController::class, 'create'])->name('abastecimentos.cadastro');
Route::post('/abastecimentos/registrar', [AbastecimentosController::class, 'store'])->name('abastecimentos.registrar');
Route::get('/abastecimentos/lista', [AbastecimentosController::class, 'index'])->name('abastecimentos.lista');
Route::get('/abastecimento/visualizar/{id}', [AbastecimentosController::class, 'show'])->name('abastecimento.mostrar');
Route::get('/abastecimento/editar/{id}', [AbastecimentosController::class, 'edit'])->name('abastecimento.editar');
Route::post('/abastecimento/update/{id}', [AbastecimentosController::class, 'update'])->name('abastecimento.atualizar');
Route::post('/abastecimento/deletar/{id}', [AbastecimentosController::class, 'destroy'])->name('abastecimento.deletar');
