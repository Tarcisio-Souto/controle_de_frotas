<?php

namespace App\Http\Controllers;

use App\Models\Servicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servicos::all();
        return Inertia::render('Servicos/ListAllServicos.vue', ['servicos' => $servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Servicos/AddServico.vue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = new Servicos();

        $servico->descricao_servicos = $request->nome;
        $servico->save();

        return Redirect::route('servicos.cadastro')->with('success', 'Serviço registrado com sucesso!');            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servicos::showServico($id);
        return Inertia::render('Servicos/ViewServico.vue', ['servico' => $servico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servico = Servicos::showServico($id);
        return Inertia::render('Servicos/EditServico.vue', ['servico' => $servico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servico = Servicos::find($request->id);
        $servico->descricao_servicos = $request->descricao_servicos;
        $servico->save();

        $servicos = Servicos::all();
        return Redirect::route('servicos.lista', ['servicos' => $servicos])->with('success', 'Atualizações registradas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('servicos')->delete($id);
        $servicos = Servicos::all();
        return Redirect::route('servicos.lista', ['servicos' => $servicos]);
    }
}
