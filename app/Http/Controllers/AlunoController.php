<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreAlunoRequest;
//use App\Http\Requests\UpdateAlunoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Curso;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome')->paginate(15);
        return view('alunos.index')->with('alunos',$alunos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::with('alunos')->get();

        return view('alunos.create', [
            'aluno' => new Aluno,
        ])->with('cursos',$cursos);
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
        $aluno->nome_social = $request->nome_social;
        $aluno->cpf = $request->cpf;
        $aluno->status = $request->status;
        $aluno->sexo = $request->sexo;
        $aluno->nome_pai = $request->nome_pai;
        $aluno->nome_mae = $request->nome_mae;
        $aluno->email = $request->email;
        $aluno->whatsapp = $request->whatsapp;
        $aluno->status_utilizacao_nome_social = $request->status_utilizacao_nome_social;
        $aluno->id_turma = $request->id_turma;
        $aluno->id_curso = $request->id_curso;
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
        $cursos = Curso::with('alunos')->get();

        return view('alunos.show',[
            'aluno' => $aluno
        ])->with('cursos',$cursos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        $cursos = Curso::with('alunos')->get();

        return view('alunos.edit', [
            'aluno' => $aluno
        ])->with('cursos',$cursos);
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
        $aluno->nome_social = $request->nome_social;
        $aluno->cpf = $request->cpf;
        $aluno->status = $request->status;
        $aluno->sexo = $request->sexo;
        $aluno->nome_pai = $request->nome_pai;
        $aluno->nome_mae = $request->nome_mae;
        $aluno->email = $request->email;
        $aluno->whatsapp = $request->whatsapp;
        $aluno->status_utilizacao_nome_social = $request->status_utilizacao_nome_social;
        $aluno->id_turma = $request->id_turma;
        $aluno->id_curso = $request->id_curso;
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
