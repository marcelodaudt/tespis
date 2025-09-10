<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\PreRequisito;
use Illuminate\Http\Request;

class PreRequisitoController extends Controller
{
    // Mostrar formulário para gerenciar pré-requisitos
    public function create($disciplinaId)
    {
        $disciplina = Disciplina::with(['preRequisitos', 'disciplinasQueRequerem'])->findOrFail($disciplinaId);

        // verificação: a disciplina não pode ser pré-requisito de si mesma ou já é pré-requisito
        // Disciplinas disponíveis para serem pré-requisitos: excluindo ela mesma e as disciplinas em que ela já é pré-requisto
        $disciplinasDisponiveis = Disciplina::where('id', '!=', $disciplinaId)
            ->whereNotIn('id', $disciplina->preRequisitos->pluck('id'))
            ->whereNotIn('id', $disciplina->DisciplinasQueRequerem->pluck('id'))
            ->orderBy('nome_disciplina')
            ->get();
        
        return view('disciplinas.pre-requisitos')->with([
            'disciplina' => $disciplina,
            'disciplinasDisponiveis' => $disciplinasDisponiveis
        ]);
    }

    public function store(Request $request, $disciplinaId)
    {
        $disciplina = Disciplina::findOrFail($disciplinaId);

        $preRequisito = new PreRequisito;
        $preRequisito->id_disciplina = $disciplinaId;
        $preRequisito->id_pre_requisito = $request->id_pre_requisito;
        $preRequisito->save();
        return redirect()->back();
    }

    // API: Listar pré-requisitos de uma disciplina
    public function getPreRequisitos($disciplinaId)
    {
        $disciplina = Disciplina::with('preRequisitos')->findOrFail($disciplinaId);

        return response()->json([
            'disciplina' => $disciplina->only(['id', 'nome_disciplina']),
            'pre_requisitos' => $disciplina->preRequisitos
        ]);
    }

    // API: Listar disciplinas que requerem esta como pré-requisito
    public function getDisciplinasQueRequerem($disciplinaId)
    {
        $disciplina = Disciplina::with('disciplinasQueRequerem')->findOrFail($disciplinaId);

        return response()->json([
            'disciplina' => $disciplina->only(['id', 'nome_disciplina']),
            'disciplinas_que_requerem' => $disciplina->disciplinasQueRequerem
        ]);
    }

    public function destroy($disciplinaId, $preRequisitoId)
    {
        $disciplina = PreRequisito::where('id_disciplina', $disciplinaId)
                      ->where('id_pre_requisito', $preRequisitoId)
                      ->delete();
        
        return redirect()->back();
    }
}
