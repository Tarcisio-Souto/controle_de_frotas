<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Enderecos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $empresas = Empresas::all();
        return Inertia::render('Empresas/ListAllEmpresas.vue', ['empresas' => $empresas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Empresas/AddEmpresa.vue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $address = new Enderecos();
        $address->bairro = $req->bairro;
        $address->cep = $req->cep;
        $address->cidade = $req->cidade;
        $address->logradouro = $req->logradouro;
        $address->numero = $req->numero;
        $address->uf = $req->estado;
        $address->save();

        # Obter o ID do último registro da tabela:
        $fk_address = DB::getPdo()->lastInsertId();

        $empresa = new Empresas();

        $empresa->nome = $req->nome;
        $empresa->cnpj = $req->cnpj;
        $empresa->fk_endereco = $fk_address;

        $empresa->save();

        return Redirect::route('empresas.cadastro')->with('success', 'Colaborador registrado com sucesso!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $empresa = Empresas::showEmpresa($id);
        return Inertia::render('Empresas/ViewEmpresa.vue', ['empresa' => $empresa]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresas::showEmpresa($id);
        return Inertia::render('Empresas/EditEmpresa.vue', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas)
    {
        
        $empresa = Empresas::find($request->id);
        //dd($request->all());

        $address = Enderecos::find($request->fk_endereco);

        $address->bairro = $request->bairro;
        $address->cep = $request->cep;
        $address->cidade = $request->cidade;
        $address->logradouro = $request->logradouro;
        $address->numero = $request->numero;
        $address->uf = $request->estado;
        $address->save();

        $empresa->nome = $request->nome;
        $empresa->cnpj = $request->cnpj;
        $empresa->fk_endereco = $request->fk_endereco;

        $empresa->save();

        $empresas = Empresas::all();
        return Inertia::render('Empresas/ListAllEmpresas.vue', ['empresas' => $empresas])->with('success', 'Atualizações registradas com sucesso!');          


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        DB::table('empresas')->delete($id);
        $empresas = Empresas::all();
        return Redirect::route('empresas.lista', ['empresas' => $empresas]);

    }
}
