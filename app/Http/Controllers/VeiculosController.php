<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Modelos;
use App\Models\Veiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class VeiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculos::listAllVeiculos();
        return Inertia::render('Veiculos/ListAllVeiculos.vue', ['veiculos' => $veiculos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::all();
        $modelos = Modelos::all();
        return Inertia::render('Veiculos/AddVeiculo.vue', ['empresas' => $empresas, 'modelos' => $modelos]);
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

        $veiculo = new Veiculos();

        $veiculo->fk_modelo = $request->modelo;
        $veiculo->fk_empresa = $request->empresa;
        $veiculo->placa = $request->placa;
        $veiculo->quilometragem = $request->km;
        $veiculo->tipo = $request->tipo;
        $veiculo->ano = $request->ano;

        $veiculo->save();

        return Redirect::route('veiculos.cadastro')->with('success', 'Veiculo registrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $veiculo = Veiculos::showVeiculo($id);
        //dd($veiculo);
        return Inertia::render('Veiculos/ViewVeiculo.vue', ['veiculo' => $veiculo]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veiculo = Veiculos::find($id)->first();
        $empresas = Empresas::all();
        $modelos = Modelos::all();

        return Inertia::render('Veiculos/EditVeiculo.vue', 
        []);


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
