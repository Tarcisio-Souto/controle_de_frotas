<?php

namespace App\Http\Controllers;

use App\Models\Fabricantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class FabricantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabricantes = Fabricantes::all();
        return Inertia::render('Fabricantes/ListAllFabricantes.vue', ['fabricantes' => $fabricantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Fabricantes/AddFabricante.vue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabricante = new Fabricantes();

        $fabricante->nome_fabricante = $request->nome;
        $fabricante->save();

        return Redirect::route('fabricante.cadastro')->with('success', 'Fabricante registrado com sucesso!');            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fabricante = Fabricantes::showFabricante($id);
        return Inertia::render('Fabricantes/ViewFabricante.vue', ['fabricante' => $fabricante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fabricante = Fabricantes::showFabricante($id);
        return Inertia::render('Fabricantes/EditFabricante.vue', ['fabricante' => $fabricante]);
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
        $fabricante = Fabricantes::find($request->id);
        $fabricante->nome_fabricante = $request->nome;
        $fabricante->save();

        $fabricantes = Fabricantes::all();
        return Redirect::route('fabricantes.lista', ['fabricantes' => $fabricantes])->with('success', 'Atualizações registradas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('fabricantes')->delete($id);
        $fabricantes = Fabricantes::all();
        return Redirect::route('fabricantes.lista', ['fabricantes' => $fabricantes]);
    }
}
