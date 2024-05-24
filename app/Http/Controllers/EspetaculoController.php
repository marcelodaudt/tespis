<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreEspetaculoRequest;
//use App\Http\Requests\UpdateEspetaculoRequest;
use Illuminate\Http\Request;

use App\Models\Espetaculo;

class EspetaculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espetaculos = Espetaculo::all();
        return view('espetaculos.index', [
            'espetaculos' => $espetaculos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('espetaculos.create', [
            'espetaculo' => new Espetaculo
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEspetaculoRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreEspetaculoRequest $request)
    public function store(Request $request)
    {
        $espetaculo = new Espetaculo;
        $espetaculo->nome_espetaculo = $request->nome_espetaculo;
        $espetaculo->ano = $request->ano;
        $espetaculo->tempo = $request->tempo;
        $espetaculo->tipo = $request->tipo;
        $espetaculo->save();
        return redirect("/espetaculos/{$espetaculo->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Espetaculo  $espetaculo
     * @return \Illuminate\Http\Response
     */
    public function show(Espetaculo $espetaculo)
    {
        return view('espetaculos.show', [
            'espetaculo' => $espetaculo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Espetaculo  $espetaculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Espetaculo $espetaculo)
    {
        return view('espetaculos.edit', [
            'espetaculo' => $espetaculo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEspetaculoRequest  $request
     * @param  \App\Models\Espetaculo  $espetaculo
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateEspetaculoRequest $request, Espetaculo $espetaculo)
    public function update(Request $request, Espetaculo $espetaculo)
    {
        $espetaculo->nome_espetaculo = $request->nome_espetaculo;
        $espetaculo->ano = $request->ano;
        $espetaculo->tempo = $request->tempo;
        $espetaculo->tipo = $request->tipo;
        $espetaculo->save();
        return redirect("/espetaculos/{$espetaculo->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Espetaculo  $espetaculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espetaculo $espetaculo)
    {
        $espetaculo->delete();
        return redirect('/espetaculos');
    }
}
