@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Gerenciar Disciplinas do Docente: {{ $docente->nome_docente }} {{ $docente->sobrenome_docente }}</h3>
                    <p><class="text-muted">Código: {{ $docente->id }}</p>
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
                        <!-- Disciplinas atuais -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5>Disciplinas Atuais</h5>
                                </div>
                                <div class="card-body">
                                    @if($docente->disciplinas->count() > 0)
                                        <ul class="list-group">
                                            @foreach($docente->disciplinas as $disciplina)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $disciplina->nome_disciplina }} ({{ $disciplina->id }})
                                                    <form action="{{ route('docentes.disciplinas.destroy', [$docente->id, $disciplina->id]) }}" 
                                                          method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Remover este vinculo?')">
                                                            ✕ Remover
                                                        </button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">Nenhuma disciplina vinculada.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Adicionar novos pré-requisitos -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <h5>Vincular Disciplina</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('docentes.vincular-disciplinas.store', $docente->id) }}">
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label for="id_disciplina">Selecione a disciplina a ser vinculada:</label>
                                            <select name="id_disciplina" multiple class="form-control" size="8" required>
                                                @foreach($disciplinasDisponiveis as $disciplinaDisp)
                                                    <option value="{{ $disciplinaDisp->id }}">
                                                        {{ $disciplinaDisp->nome_disciplina }} ({{ $disciplinaDisp->id }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-3">
                                            Adicionar Vinculo
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('docentes.index') }}" class="btn btn-secondary">
                            ← Voltar para Lista de Docentes
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
