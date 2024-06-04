<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreDisciplinaRequest;
//use App\Http\Requests\UpdateDisciplinaRequest;
use Illuminate\Http\Request;

use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplinas =  Disciplina::all();
        return view('disciplinas.index',[
            'disciplinas' => $disciplinas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.create', [
            'disciplina' => new Disciplina
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDisciplinaRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreDisciplinaRequest $request)
    public function store(Request $request)
    {
        $disciplina = new Disciplina;
        $disciplina->nome_disciplina = $request->nome_disciplina;
        $disciplina->descricao = $request->descricao;
        $disciplina->id_departamento = $request->id_departamento;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->numero_alunos = $request->numero_alunos;
        $disciplina->save();
        return redirect("/disciplinas/{$disciplina->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show',[
            'disciplina' => $disciplina
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
        return view('disciplinas.edit',[
            'disciplina' => $disciplina
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDisciplinaRequest  $request
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateDisciplinaRequest $request, Disciplina $disciplina)
    public function update(Request $request, Disciplina $disciplina)
    {
        $disciplina->nome_disciplina = $request->nome_disciplina;
        $disciplina->descricao = $request->descricao;
        $disciplina->id_departamento = $request->id_departamento;
        $disciplina->carga_horaria = $request->carga_horaria;
        $disciplina->numero_alunos = $request->numero_alunos;
        $disciplina->save();
        return redirect("/disciplinas/{$disciplina->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
        $disciplina->delete();
        return redirect('/disciplinas');
    }
}