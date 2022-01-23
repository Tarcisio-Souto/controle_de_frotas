<?php

namespace App\Http\Controllers;

use App\Models\Postos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postos = Postos::all();
        return Inertia::render('Postos/ListAllPostos.vue', ['postos' => $postos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Postos/AddPosto.vue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posto = new Postos();

        $posto->nome_posto = $request->nome;
        $posto->save();

        return Redirect::route('postos.cadastro')->with('success', 'Posto registrado com sucesso!');            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posto = Postos::showPosto($id);
        return Inertia::render('Postos/ViewPosto.vue', ['posto' => $posto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posto = Postos::showPosto($id);
        return Inertia::render('Postos/EditPosto.vue', ['posto' => $posto]);
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
        $postos = Postos::find($request->id);
        $postos->nome_posto = $request->nome;
        $postos->save();

        $postos = Postos::all();
        return Redirect::route('postos.lista', ['postos' => $postos])->with('success', 'Atualizações registradas com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('postos')->delete($id);
        $postos = Postos::all();
        return Redirect::route('postos.lista', ['postos' => $postos]);
    }
}
