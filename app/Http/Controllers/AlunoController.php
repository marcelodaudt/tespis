<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreAlunoRequest;
//use App\Http\Requests\UpdateAlunoRequest;
use Illuminate\Http\Request;

use App\Models\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos =  Aluno::all();
        return view('alunos.index',[
            'alunos' => $alunos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create', [
            'aluno' => new Aluno
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlunoRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreAlunoRequest $request)
    public function store(Request $request)
    {
        $aluno = new Aluno;
        $aluno->numero_usp = $request->numero_usp;
        $aluno->nome = $request->nome;
        $aluno->sobrenome = $request->sobrenome;
        $aluno->cpf = $request->cpf;
        $aluno->status = $request->status;
        $aluno->sexo = $request->sexo;
        $aluno->nome_pai = $request->nome_pai;
        $aluno->nome_mae = $request->nome_mae;
        $aluno->email = $request->email;
        $aluno->whatsapp = $request->whatsapp;
        $aluno->status_utilizacao_nome_social = $request->status_utilizacao_nome_social;
        $aluno->save();
        return redirect("/alunos/{$aluno->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show',[
            'aluno' => $aluno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', [
            'aluno' => $aluno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlunoRequest  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateAlunoRequest $request, Aluno $aluno)
    public function update(Request $request, Aluno $aluno)
    {
        $aluno->numero_usp = $request->numero_usp;
        $aluno->nome = $request->nome;
        $aluno->sobrenome = $request->sobrenome;
        $aluno->cpf = $request->cpf;
        $aluno->status = $request->status;
        $aluno->sexo = $request->sexo;
        $aluno->nome_pai = $request->nome_pai;
        $aluno->nome_mae = $request->nome_mae;
        $aluno->email = $request->email;
        $aluno->whatsapp = $request->whatsapp;
        $aluno->status_utilizacao_nome_social = $request->status_utilizacao_nome_social;
        $aluno->save();
        return redirect("/alunos/{$aluno->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect('/alunos');
    }
}
