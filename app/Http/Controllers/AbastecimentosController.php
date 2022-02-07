<?php

namespace App\Http\Controllers;

use App\Exports\AbastecimentosExport;
use App\Models\Abastecimentos;
use App\Models\Postos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class AbastecimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abastecimentos = Abastecimentos::listAllAbastecimentos();
        return Inertia::render('Abastecimentos/ListAllAbastecimentos.vue', ['abastecimentos' => $abastecimentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veiculos = Abastecimentos::getVeiculos();
        $postos = Postos::all();
        return Inertia::render('Abastecimentos/AddAbastecimento.vue', ['veiculos' => $veiculos, 'postos' => $postos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abastecimento = new Abastecimentos();

        $abastecimento->fk_veiculo = $request->veiculo;
        $abastecimento->fk_posto = $request->posto;

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $abastecimento->custo_total = $custo;

        $data = explode("/", $request->data_abastecimento);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];
        $data_formatada = $ano . '-' . $mes . '-' . $dia;

        $data_old = date($data_formatada);
        $abastecimento->data_abastecimento = $data_old;

        $abastecimento->save();

        return Redirect::route('abastecimentos.cadastro')->with('success', 'Abastecimento registrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $abastecimento = Abastecimentos::showAbastecimento($id);
        return Inertia::render('Abastecimentos/ViewAbastecimento.vue', ['abastecimento' => $abastecimento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $abastecimento = Abastecimentos::showAbastecimento($id);
        $veiculos = Abastecimentos::getVeiculos();
        $postos = Postos::all();

        return Inertia::render('Abastecimentos/EditAbastecimento.vue', 
        ['abastecimento' => $abastecimento, 'veiculos' => $veiculos, 'postos' => $postos]);


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
        
        $abastecimento = Abastecimentos::find($request->id);
        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $abastecimento->custo_total = $custo;

        $data = explode("/",$request->data_abastecimento);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $abastecimento->data_abastecimento = $data_old;

        $aux_veiculo = explode('/', $request->veiculo);
        $placa = trim($aux_veiculo[1]);        
        $veiculo = Veiculos::where('placa', '=', $placa)->first();
        $abastecimento->fk_veiculo = $veiculo->id;

        $posto = Postos::where('nome_posto', '=', $request->posto)->first();
        $abastecimento->fk_posto = $posto->id;

        $abastecimento->save();

        $abastecimento = Abastecimentos::all();
        return Redirect::route('abastecimentos.lista', ['abastecimento' => $abastecimento])->with('success', 'Atualizações registradas com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('abastecimentos')->delete($id);
        $abastecimentos = Abastecimentos::all();
        return Redirect::route('manutencoes.lista', ['abastecimentos' => $abastecimentos]);
    }


    public function selectRelAbastecimentos() {

        return Inertia::render('Abastecimentos/RelatoriosAbastecimentos.vue');

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
        
        return Excel::download(new AbastecimentosExport($periodoIni,
        $periodoFim, $regiao1, $regiao2, $regiao3,
        $regiao4, $regiao5, $regiao6), 
        'Relatório_Abastecimentos_Região_Período_Tipo_Serviço.xlsx');

    }


}
