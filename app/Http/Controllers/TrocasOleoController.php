<?php

namespace App\Http\Controllers;

use App\Models\Oficinas;
use App\Models\Trocas_Oleos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TrocasOleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trocas = Trocas_Oleos::listAllTrocas();
        return Inertia::render('Trocas_Oleo/ListAllTrocasOleo.vue', ['trocas' => $trocas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $oficinas = Oficinas::all();
        $veiculos = Trocas_Oleos::getVeiculos();

        return Inertia::render('Trocas_Oleo/AddTrocaOleo.vue', 
        ['oficinas' => $oficinas, 'veiculos' => $veiculos]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $troca_oleo = new Trocas_Oleos();
        $troca_oleo->nome_oleo = $request->nome_oleo;
        $troca_oleo->fk_veiculo = $request->veiculo;
        $troca_oleo->fk_oficina = $request->oficina;
        
        $data = explode("/", $request->data_troca);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];
        $data_formatada = $ano . '-' . $mes . '-' . $dia;

        $data_old = date($data_formatada);
        $troca_oleo->data_troca = $data_old;        
        
        $troca_oleo->filtro_oleo = $request->filtro_oleo;
        $troca_oleo->filtro_combustivel = $request->filtro_combustivel;
        $troca_oleo->km_troca = $request->km_troca;
        $troca_oleo->km_prox_troca = $request->km_prox_troca;
        $troca_oleo->custo_total = $request->custo;

        $troca_oleo->save();

        return Redirect::route('trocas-oleo.cadastro')->with('success', 'Troca de óleo registrada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $troca = Trocas_Oleos::showTroca($id);
        return Inertia::render('Trocas_Oleo/ViewTrocaOleo.vue', ['troca' => $troca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
