<?php

namespace App\Http\Controllers;

use App\Models\modelos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = modelos::all();
        return Inertia::render('Modelos/ListAllModelos.vue', ['modelos' => $modelos]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function show(modelos $modelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function edit(modelos $modelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelos $modelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(modelos $modelos)
    {
        //
    }
}
