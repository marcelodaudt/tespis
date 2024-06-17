<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreAlunoRequest;
//use App\Http\Requests\UpdateAlunoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){
            $alunos = Aluno::where('numero_usp','LIKE',"%{$request->busca}%")
            ->orWhere('nome','LIKE',"%{$request->busca}%")
            ->orderBy('nome')->paginate(15);
        } else if(isset($request->busca)) {
            $alunos = Aluno::where('numero_usp','LIKE',"%{$request->busca}%")
            ->orWhere('nome','LIKE',"%{$request->busca}%")->orderBy('nome')->paginate(15);
        } else {
            $alunos = Aluno::orderBy('nome')->paginate(15);
        }

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
        $turmas = Turma::with('alunos')->get();

        return view('alunos.create')->with([
            'aluno' => new Aluno,
            'turmas' => $turmas,    
            'cursos' => $cursos
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
        $turmas = Turma::with('alunos')->get();

        return view('alunos.show')->with([
            'aluno' => $aluno,
            'turmas' => $turmas,
            'cursos' => $cursos
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
        $cursos = Curso::with('alunos')->get();
        $turmas = Turma::with('alunos')->get();

        return view('alunos.edit')->with([
            'aluno' => $aluno,
            'cursos' => $cursos,
            'turmas' => $turmas
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
