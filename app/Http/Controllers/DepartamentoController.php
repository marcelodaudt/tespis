<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreDepartamentoRequest;
//use App\Http\Requests\UpdateDepartamentoRequest;
use Illuminate\Http\Request;

use App\Models\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){

            $departamentos = Departamento::where('nome_departamento','LIKE',"%{$request->busca}%")
            ->orWhere('nome','LIKE',"%{$request->busca}%")
            ->where('status', $request->buscastatus)->orderBy('nome_departamento')->paginate(10);
        } else if(isset($request->busca)) {
            $departamentos = Departamento::where('nome_departamento','LIKE',"%{$request->busca}%")
            ->orderBy('nome_departamento')->paginate(10);
        } else {
            $departamentos = Departamento::orderBy('nome_departamento')->paginate(10);
        }
        
        return view('departamentos.index')->with('departamentos',$departamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create', [
            'departamento' => new Departamento
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepartamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreDepartamentoRequest $request)
    public function store(Request $request)
    {
        $departamento = new Departamento;
        $departamento->nome_departamento = $request->nome_departamento;
        $departamento->save();
        return redirect("/departamentos/{$departamento->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return view('departamentos.show',[
            'departamento' => $departamento
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit',[
            'departamento' => $departamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartamentoRequest  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    public function update(Request $request, Departamento $departamento)
    {
        $departamento->nome_departamento = $request->nome_departamento;
        $departamento->save();
        return redirect("/departamentos/{$departamento->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect('/departamentos');
    }
}
