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
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){
            $espetaculos = Espetaculo::where('nome_departamento','LIKE',"%{$request->busca}%")
            ->orderBy('nome_espetaculo')->paginate(15);
        } else if(isset($request->busca)) {
            $espetaculos = Espetaculo::where('nome_espetaculo','LIKE',"%{$request->busca}%")
            ->orderBy('nome_espetaculo')->paginate(15);
        } else {
            $espetaculos = Espetaculo::orderBy('nome_espetaculo')->paginate(15);
        }
        
        return view('espetaculos.index')->with('espetaculos',$espetaculos);
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
        $espetaculo->termo = $request->termo;
        $espetaculo->turma = $request->turma;
        $espetaculo->categoria = $request->categoria;
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
        $espetaculo->termo = $request->termo;
        $espetaculo->turma = $request->turma;
        $espetaculo->categoria = $request->categoria;
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
