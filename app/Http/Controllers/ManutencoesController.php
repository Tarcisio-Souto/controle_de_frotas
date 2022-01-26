<?php

namespace App\Http\Controllers;

use App\Models\Manutencoes;
use App\Models\Oficinas;
use App\Models\Servicos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ManutencoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manutencoes = Manutencoes::getManutencoes();
        return Inertia::render('Manutencoes/ListAllManutencoes.vue', ['manutencoes' => $manutencoes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veiculos = Manutencoes::getVeiculos();
        $oficinas = Oficinas::all();
        $servicos = Servicos::all();

        return Inertia::render('Manutencoes/AddManutencao.vue', 
        ['veiculos' => $veiculos, 'oficinas' => $oficinas, 'servicos' => $servicos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $manutencao = new Manutencoes();

        $manutencao->fk_veiculo = $request->veiculo;
        $manutencao->fk_oficina = $request->oficina;
        $manutencao->fk_servico = $request->servico;
        $manutencao->custo_total = $request->veiculo;
        $manutencao->observacao = $request->observacao;
        

        $data = explode("/",$request->data_manutencao);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $manutencao->data_manutencao = $data_old;   
        $manutencao->save();

        return Redirect::route('manutencoes.cadastro')->with('success', 'Manutenção registrada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manutencoes  $manutencoes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manutencao = Manutencoes::showManutencao($id);
        return Inertia::render('Manutencoes/ViewManutencao.vue', ['manutencao' => $manutencao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manutencoes  $manutencoes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manutencao = Manutencoes::showManutencao($id);
        $veiculos = Manutencoes::getVeiculos();
        $oficinas = Oficinas::all();
        $servicos = Servicos::all();

        //dd($manutencao);
        return Inertia::render('Manutencoes/EditManutencao.vue', 
        ['manutencao' => $manutencao, 'oficinas' => $oficinas, 'servicos' => $servicos, 
        'veiculos' => $veiculos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manutencoes  $manutencoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manutencoes $manutencoes)
    {
        dd($request->all());

        /*$oficina = Oficinas::find($request->id);
        $oficina->nome_oficina = $request->nome;
        $oficina->save();

        $oficinas = Oficinas::all();
        return Redirect::route('oficinas.lista', ['oficinas' => $oficinas])->with('success', 'Atualizações registradas com sucesso!');*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manutencoes  $manutencoes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*DB::table('oficinas')->delete($id);
        $oficinas = Oficinas::all();
        return Redirect::route('oficinas.lista', ['oficinas' => $oficinas]);*/
    }
}
