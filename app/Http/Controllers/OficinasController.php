<?php

namespace App\Http\Controllers;

use App\Models\Oficinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OficinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficinas::all();
        return Inertia::render('Oficinas/ListAllOficinas.vue', ['oficinas' => $oficinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Oficinas/AddOficina.vue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oficina = new Oficinas();

        $oficina->nome_oficina = $request->nome;
        
        $oficina->save();
        return Redirect::route('oficinas.cadastro')->with('success', 'Oficina registrada com sucesso!');            

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = Oficinas::showOficina($id);
        return Inertia::render('Oficinas/ViewOficina.vue', ['oficina' => $oficina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = Oficinas::showOficina($id);

        //dd($oficina[0]->nome_oficina);

        return Inertia::render('Oficinas/EditOficina.vue', ['oficina' => $oficina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficinas $oficinas)
    {
        $oficina = Oficinas::find($request->id);
        $oficina->nome_oficina = $request->nome;
        $oficina->save();

        $oficinas = Oficinas::all();
        return Redirect::route('oficinas.lista', ['oficinas' => $oficinas])->with('success', 'Atualiza????es registradas com sucesso!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('oficinas')->delete($id);
        $oficinas = Oficinas::all();
        return Redirect::route('oficinas.lista', ['oficinas' => $oficinas]);
    }
}
