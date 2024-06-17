<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreTurmaRequest;
//use App\Http\Requests\UpdateTurmaRequest;
use Illuminate\Http\Request;

use App\Models\Turma;
use App\Models\Curso;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){

            $turmas = Turma::where('numero_turma','LIKE',"%{$request->busca}%")
            ->orderBy('numero_turma')->paginate(10);
        } else if(isset($request->busca)) {
            $turmas = Turma::where('numero_turma','LIKE',"%{$request->busca}%")
            ->orderBy('numero_turma')->paginate(10);
        } else {
            $turmas = Turma::orderBy('numero_turma')->paginate(10);
        }
        
        return view('turmas.index')->with('turmas',$turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::with('turmas')->get();

        return view('turmas.create')->with([
            'turma' => new Turma,
            'cursos' => $cursos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTurmaRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreTurmaRequest $request)
    public function store(Request $request)
    {
        $turma = new Turma;
        $turma->numero_turma = $request->numero_turma;
        $turma->id_curso = $request->id_curso;
        $turma->periodo = $request->periodo;
        $turma->numero_alunos = $request->numero_alunos;
        $turma->data_inicio = $request->data_inicio;
        $turma->data_final = $request->data_final;
        $turma->save();
        return redirect("/turmas/{$turma->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        $cursos = Curso::with('turmas')->get();
        
        return view('turmas.show')->with([
            'turma' => $turma,
            'cursos' => $cursos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {
        $cursos = Curso::with('turmas')->get();
        
        return view('turmas.edit')->with([
            'turma' => $turma,
            'cursos' => $cursos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTurmaRequest  $request
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateTurmaRequest $request, Turma $turma)
    public function update(Request $request, Turma $turma)
    {
        $turma->numero_turma = $request->numero_turma;
        $turma->id_curso = $request->id_curso;
        $turma->periodo = $request->periodo;
        $turma->numero_alunos = $request->numero_alunos;
        $turma->data_inicio = $request->data_inicio;
        $turma->data_final = $request->data_final;
        $turma->save();
        return redirect("/turmas/{$turma->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect('/turmas');
    }
}
