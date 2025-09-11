<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Disciplina;
use App\Models\DocenteDisciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteDisciplinaController extends Controller
{
    public function create($docenteId)
    {
        $docente = Docente::findOrFail($docenteId);
        $disciplinas = Disciplina::orderBy('nome_disciplina')->get();

        // Disciplinas disponíveis para serem vinculadas, excluindo ela mesma da lista
        $disciplinasDisponiveis = Disciplina::whereNotIn('id', $docente->disciplinas->pluck('id'))
            ->orderBy('nome_disciplina')
            ->get();

        return view('docentes.vincular-disciplinas')->with([
            'docente' => $docente,
            'disciplinas' => $disciplinas,
            'disciplinasDisponiveis' => $disciplinasDisponiveis
        ]);
    }

    public function store(Request $request, $docenteId)
    {     
        $docente = Docente::findOrFail($docenteId);

        $docente_disciplina = new DocenteDisciplina;
        $docente_disciplina->id_docente =  $docente->id;
        $docente_disciplina->id_disciplina = $request->id_disciplina;
        $docente_disciplina->save();
        return redirect()->back();
    }

    // Método para mostrar disciplinas do docente
    public function show($docenteId)
    {
        $docente = Docente::with('disciplinas')->findOrFail($docenteId);
        
        //return view('docentes.show', compact('docente'));
        return view('docentes.show')->with([
            'docente' => $docente,
            'disciplinas' => $disciplinas
        ]);
    }

    // Método para remover vínculo
    public function destroy($docenteId, $disciplinaId)
    {
        $docente = Docente::findOrFail($docenteId);
        $docente->disciplinas()->detach($disciplinaId);
        
        return redirect()->back();
    }
}