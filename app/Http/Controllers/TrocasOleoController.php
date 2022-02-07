<?php

namespace App\Http\Controllers;

use App\Exports\TrocasOleosExport;
use App\Models\Oficinas;
use App\Models\Trocas_Oleos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

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

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $troca_oleo->custo_total = $custo;

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
        $troca = Trocas_Oleos::showTroca($id);

        //dd($troca);

        $veiculos = Trocas_Oleos::getVeiculos();
        $oficinas = Oficinas::all();

        return Inertia::render('Trocas_Oleo/EditTrocaOleo.vue', 
        ['troca' => $troca, 'veiculos' => $veiculos, 'oficinas' => $oficinas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $troca = Trocas_Oleos::find($request->id);
        $troca->km_troca = $request->km_troca;
        $troca->km_prox_troca = $request->km_prox_troca;
        $troca->filtro_oleo = $request->filtro_oleo;
        $troca->filtro_combustivel = $request->filtro_combustivel;
        $troca->nome_oleo = $request->nome_oleo;
       
        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $troca->custo_total = $custo;

        $data = explode("/",$request->data_troca);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $troca->data_troca = $data_old;

        $aux_veiculo = explode('/', $request->veiculo);
        $placa = trim($aux_veiculo[1]);        
        $veiculo = Veiculos::where('placa', '=', $placa)->first();
        $troca->fk_veiculo = $veiculo->id;

        $oficina = Oficinas::where('nome_oficina', '=', $request->oficina)->first();
        $troca->fk_oficina = $oficina->id;

        $troca->save();

        $trocas = Trocas_Oleos::all();
        return Redirect::route('trocas-oleo.lista', ['trocas' => $trocas])->with('success', 'Atualizações registradas com sucesso!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        DB::table('trocas_oleos')->delete($id);
        $trocas = Trocas_Oleos::all();
        return Redirect::route('trocas-oleo.lista', ['trocas' => $trocas]);
    }


    public function selectRelTrocasOleo() {

        return Inertia::render('Trocas_Oleo/RelatoriosTrocasOleo.vue');

    }

    public function getRelatorio1(Request $req)
    {
        
        $regiao1 = ''; $regiao2 = ''; $regiao3 = ''; 
        $regiao4 = ''; $regiao5 = ''; $regiao6 = '';

        $periodoFim = null; $periodoIni = null;
        
        if ($req->regiao1 != "null")
            $regiao1 = 'Vitória Hospitalar ES'; 
        if ($req->regiao2 != "null")
            $regiao2 = 'Vitória Hospitalar MG';
        if ($req->regiao3 != "null")
            $regiao3 = 'Vitória Hospitalar RJ';
        if ($req->regiao4 != "null")
            $regiao4 = 'Vitória Hospitalar SP';
        if ($req->regiao5 != "null")
            $regiao5 = 'Healthcare Logística RJ';
        if ($req->regiao6 != "null")
            $regiao6 = 'Healthcare Logística SP';
        

        $data = explode("/",$req->periodoIni);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;
    
        $data_old = date($data_formatada);
        $periodoIni = $data_old;

        $data = explode("/",$req->periodoFim);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;
    
        $data_old = date($data_formatada);
        $periodoFim = $data_old;
        
        return Excel::download(new TrocasOleosExport($periodoIni,
        $periodoFim, $regiao1, $regiao2, $regiao3,
        $regiao4, $regiao5, $regiao6), 
        'Relatório_TrocasOleo_Região_Período_Tipo_Serviço.xlsx');

    }





}
