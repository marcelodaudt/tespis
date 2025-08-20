<?php

namespace App\Http\Controllers;

//use App\Http\Requests\StoreDocenteRequest;
//use App\Http\Requests\UpdateDocenteRequest;
use Illuminate\Http\Request;

use App\Models\Docente;
use App\Models\Departamento;
use App\Models\Disciplina;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){
            $docentes = Docente::where('nome_docente','LIKE',"%{$request->busca}%")
            ->orWhere('sobrenome_docente','LIKE',"%{$request->busca}%")
            ->orderBy('nome_docente')->paginate(10);
        } else if(isset($request->busca)) {
            $docentes = Docente::where('nome_docente','LIKE',"%{$request->busca}%")
            ->orWhere('sobrenome_docente','LIKE',"%{$request->busca}%")
            ->orderBy('nome_docente')->paginate(10);
        } else {
            $docentes = Docente::orderBy('nome_docente')->paginate(10);
        }
        
        $departamentos = Departamento::with('docentes')->get();

        return view('docentes.index')->with([
            'docentes' => $docentes,
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::with('docentes')->get();
        $disciplinas = Disciplina::all();

        return view('docentes.create')->with([
            'docente' => new Docente,
            'departamentos' => $departamentos,
            'disciplinas' => $disciplinas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(StoreDocenteRequest $request)
    public function store(Request $request)
    {
        $docente = new Docente;
        $docente->nome_docente = $request->nome_docente;
        $docente->sobrenome_docente = $request->sobrenome_docente;
        $docente->status = $request->status;
        $docente->id_departamento = $request->id_departamento;
        $docente->id_disciplina = $request->id_disciplina;
        $docente->save();
        return redirect("/docentes/{$docente->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        $departamentos = Departamento::with('docentes')->get();
        $disciplinas = Disciplina::all();
        
        return view('docentes.show')->with([
            'docente' => $docente,
            'departamentos' => $departamentos,
            'disciplinas' => $disciplinas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        $departamentos = Departamento::with('docentes')->get();
        $disciplinas = Disciplina::all();
        
        return view('docentes.edit')->with([
            'docente' => $docente,
            'departamentos' => $departamentos,
            'disciplinas' => $disciplinas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocenteRequest  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    //public function update(UpdateDocenteRequest $request, Docente $docente)
    public function update(Request $request, Docente $docente)
    {
        $docente->nome_docente = $request->nome_docente;
        $docente->sobrenome_docente = $request->sobrenome_docente;
        $docente->status = $request->status;
        $docente->id_departamento = $request->id_departamento;
        $docente->id_disciplina = $request->id_disciplina;
        $docente->save();
        return redirect("/docentes/{$docente->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect('/docentes');
    }
}
