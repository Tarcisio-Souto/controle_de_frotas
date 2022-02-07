<?php

namespace App\Http\Controllers;

use App\Exports\MultasExport;
use App\Models\Multas;
use App\Models\TiposInfracoes;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\Cast\Object_;

class MultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $multas = Multas::listAllMultas();
        return Inertia::render('Multas/ListAllMultas.vue', ['multas' => $multas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veiculos = Multas::getVeiculos();
        $infracoes = TiposInfracoes::all();
        return Inertia::render('Multas/AddMulta.vue', ['veiculos' => $veiculos, 'infracoes' => $infracoes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $multa = new Multas();
        $multa->fk_veiculo = $request->veiculo;
        $multa->fk_infracao = $request->infracao;

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $multa->custo_total = $custo;

        $data = explode("/",$request->data_multa);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $multa->data_multa = $data_old;

        $multa->save();

        return Redirect::route('multas.cadastro')->with('success', 'Multa registrada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $multa = Multas::getMulta($id);
        return Inertia::render('Multas/ViewMulta.vue', ['multa' => $multa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $multa = Multas::getMulta($id);
        $veiculos = Multas::getVeiculos();
        $infracoes = TiposInfracoes::all();

        return Inertia::render('Multas/EditMulta.vue', 
        ['multa' => $multa, 'veiculos' => $veiculos, 'infracoes' => $infracoes]);

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
        //dd($request->all());

        $multa = Multas::find($request->id);

        $aux_custo = explode(' ', $request->custo);
        $custo = (float) $aux_custo[1];
        $multa->custo_total = $custo;

        $data = explode("/",$request->data_multa);
        $dia = $data[0];
        $mes = $data[1];
        $ano = $data[2];            
        $data_formatada = $ano.'-'.$mes.'-'.$dia;

        $data_old = date($data_formatada);
        $multa->data_multa = $data_old;

        $aux_veiculo = explode('/', $request->veiculo);
        $placa = trim($aux_veiculo[1]);        
        $veiculo = Veiculos::where('placa', '=', $placa)->first();
        $multa->fk_veiculo = $veiculo->id;

        $infracao = TiposInfracoes::where('descricao_infracao', '=', $request->infracao)->first();
        $multa->fk_infracao = $infracao->id;

        $multa->save();

        $multas = Multas::all();
        return Redirect::route('multas.lista', ['multas' => $multas])->with('success', 'Atualizações registradas com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('multas')->delete($id);
        $multas = Multas::all();
        return Redirect::route('multas.lista', ['multas' => $multas]);
    }

    
    public function selectRelMultas() {

        $infracoes = TiposInfracoes::all();
        return Inertia::render('Multas/RelatoriosMultas.vue', ['infracoes' => $infracoes]);

    }

    public function getRelatorio1(Request $req)
    {
        
        $regiao1 = ''; $regiao2 = ''; $regiao3 = ''; 
        $regiao4 = ''; $regiao5 = ''; $regiao6 = '';

        $periodoFim = null; $periodoIni = null;
        
        if ($req->regiao1 != "null")
            $regiao1 = 'Vitória Hospitalar'; 
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

        
        return Excel::download(new MultasExport($periodoIni,
        $periodoFim, $regiao1, $regiao2, $regiao3,
        $regiao4, $regiao5, $regiao6, $req->infracao), 
        'Relatório_Multas_Regiao_Período_Tipo_Infração.xlsx');
    }



}
