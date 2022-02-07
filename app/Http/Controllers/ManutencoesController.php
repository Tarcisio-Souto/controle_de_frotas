<?php

namespace App\Http\Controllers;

use App\Exports\ManutencoesExport;
use App\Models\Manutencoes;
use App\Models\Oficinas;
use App\Models\Servicos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

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

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $manutencao->custo_total = $custo;

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
    public function update(Request $request)
    {

        //dd($request->all());

        $manutencao = Manutencoes::find($request->id);
        $manutencao->observacao = $request->observacao;

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $manutencao->custo_total = $custo;

        $data = explode("/",$request->data_manutencao);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $manutencao->data_manutencao = $data_old;

        $aux_veiculo = explode('/', $request->veiculo);
        $placa = trim($aux_veiculo[1]);        
        $veiculo = Veiculos::where('placa', '=', $placa)->first();
        $manutencao->fk_veiculo = $veiculo->id;

        $oficina = Oficinas::where('nome_oficina', '=', $request->oficina)->first();
        $manutencao->fk_oficina = $oficina->id;

        $servico = Servicos::where('descricao_servicos', '=', $request->servico)->first();
        $manutencao->fk_servico = $servico->id;

        $manutencao->save();

        $manutencoes = Manutencoes::all();
        return Redirect::route('manutencoes.lista', ['manutencoes' => $manutencoes])->with('success', 'Atualizações registradas com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manutencoes  $manutencoes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('manutencoes')->delete($id);
        $manutencoes = Manutencoes::all();
        return Redirect::route('manutencoes.lista', ['manutencoes' => $manutencoes]);
    }


    public function selectRelManutencoes() {

        $servicos = Servicos::all();
        return Inertia::render('Manutencoes/RelatoriosManutencoes.vue', ['servicos' => $servicos]);

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

        
        return Excel::download(new ManutencoesExport($periodoIni,
        $periodoFim, $regiao1, $regiao2, $regiao3,
        $regiao4, $regiao5, $regiao6, $req->servico), 
        'Relatório_Manutenções_Região_Período_Tipo_Serviço.xlsx');

    }








}
