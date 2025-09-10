@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gerenciar Pré-requisitos da Disciplina: {{ $disciplina->nome_disciplina }}</h3>
                    <p><class="text-muted">Código: {{ $disciplina->id }}</p>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Pré-requisitos atuais -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5>Pré-requisitos Atuais</h5>
                                </div>
                                <div class="card-body">
                                    @if($disciplina->preRequisitos->count() > 0)
                                        <ul class="list-group">
                                            @foreach($disciplina->preRequisitos as $preRequisito)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $preRequisito->nome_disciplina }} ({{ $preRequisito->id }})
                                                    <form action="{{ route('disciplinas.pre-requisitos.destroy', [$disciplina->id, $preRequisito->id]) }}" 
                                                          method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Remover este pré-requisito?')">
                                                            ✕ Remover
                                                        </button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">Nenhum pré-requisito definido.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Adicionar novos pré-requisitos -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <h5>Adicionar Pré-requisitos</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('disciplinas.pre-requisitos.store', $disciplina->id) }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="id_pre_requisito">Selecione a disciplina pré-requisito:</label>
                                            <select name="id_pre_requisito" multiple class="form-control" size="8" required>
                                                @foreach($disciplinasDisponiveis as $disciplinaDisp)
                                                    <option value="{{ $disciplinaDisp->id }}">
                                                        {{ $disciplinaDisp->nome_disciplina }} ({{ $disciplinaDisp->id }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">
                                            Adicionar Pré-requisito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Disciplinas que requerem esta como pré-requisito -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-info text-white">
                                    <h5>Disciplinas que Requerem esta como Pré-requisito</h5>
                                </div>
                                <div class="card-body">
                                    @if($disciplina->disciplinasQueRequerem->count() > 0)
                                        <ul class="list-group">
                                            @foreach($disciplina->disciplinasQueRequerem as $disciplinaReq)
                                                <li class="list-group-item">
                                                    {{ $disciplinaReq->nome_disciplina }} ({{ $disciplinaReq->id }})
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">Nenhuma disciplina requer esta como pré-requisito.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('disciplinas.index') }}" class="btn btn-secondary">
                            ← Voltar para Lista de Disciplinas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Script para melhorar a experiência do usuário
document.addEventListener('DOMContentLoaded', function() {
    const select = document.querySelector('select[name="pre_requisitos[]"]');
    
    if (select) {
        // Adicionar busca se necessário
        select.addEventListener('focus', function() {
            this.size = 8; // Aumentar tamanho quando focado
        });
        
        select.addEventListener('blur', function() {
            this.size = 1; // Reduzir quando perde foco
        });
    }
});
</script>
@endsection