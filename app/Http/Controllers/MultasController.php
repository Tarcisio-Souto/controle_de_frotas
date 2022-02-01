<?php

namespace App\Http\Controllers;

use App\Models\Multas;
use App\Models\TiposInfracoes;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

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
        //dd($multas);
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
        $multa->custo_total = $request->custo;

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
        $multa->custo_total = $request->custo;

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
}
