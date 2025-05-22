<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Departamento;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscastatus != null && $request->busca != null){

            $cursos = Curso::where('nome_curso','LIKE',"%{$request->busca}%")
            ->orderBy('nome_curso')->paginate(5);
        } else if(isset($request->busca)) {
            $cursos = Curso::where('nome_curso','LIKE',"%{$request->busca}%")
            ->orderBy('nome_curso')->paginate(5);
        } else {
            $cursos = Curso::orderBy('nome_curso')->paginate(5);
        }
        
        $departamentos = Departamento::with('cursos')->get();

        return view('cursos.index')->with([
            'cursos' => $cursos,
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
        $departamentos = Departamento::with('cursos')->get();

        return view('cursos.create')->with([
            'curso' => new Curso,
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso;
        $curso->nome_curso = $request->nome_curso;
        $curso->id_departamento = $request->id_departamento;
        $curso->save();
        return redirect("/cursos/{$curso->id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $departamentos = Departamento::with('cursos')->get();

        return view('cursos.show')->with([
            'curso' => $curso,
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $departamentos = Departamento::with('cursos')->get();

        return view('cursos.edit')->with([
            'curso' => $curso,
            'departamentos' => $departamentos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $curso->nome_curso = $request->nome_curso;
        $curso->id_departamento = $request->id_departamento;
        $curso->save();
        return redirect("/cursos/{$curso->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect('/cursos');
    }
}
