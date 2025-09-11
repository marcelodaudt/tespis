<ul>
    <li><strong>Nome da Disciplina:</strong> {{ $disciplina->nome_disciplina ?? '' }}</li>
    <li><strong>Descrição:</strong> {{ $disciplina->descricao ?? '' }}</li>
    <li><strong>Depertamento:</strong>
      @foreach($departamentos as $departamento)
        <?php if($disciplina->id_departamento == $departamento->id) { echo $departamento->nome_departamento;}?>
      @endforeach   
    </li>
    <li><strong>Carga horária:</strong> {{ $disciplina->carga_horaria ?? '' }}</li>
    <li><strong>Número de alunos (vagas):</strong> {{ $disciplina->numero_alunos ?? '' }}</li>
  </ul>
<p>
  <form action="/disciplinas/{{ $disciplina->id }}" method="post">
    <a href="/disciplinas/{{ $disciplina->id }}/edit" class="btn btn-primary"><i class="fas fa-edit" style="font-size:16px;"></i> Editar Disciplina</a>
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza da exclusão da disciplina?');" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true" style="font-size:16px;"></i>Excluir disciplina</button></p>
  </form>
</p>

<hr>

<h4>Docentes Vinculados a Disciplina:</h4>

@if($disciplina->docentes->count() > 0)
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Docente</th>
      </tr>
    </thead>
    <tbody>
      @foreach($disciplina->docentes as $docente)
        <tr>
          <td> {{ $docente->id }} </td>
          <td> {{ $docente->nome_docente }} {{ $docente->sobrenome_docente }}</td>
      @endforeach
    </tbody>
  </table>
@else
    <p>Nenhum docente vinculado.</p>
@endif

<hr>
<hr>

<h4>Pré-requisitos Atuais da Disciplina:</h4>

@if($disciplina->preRequisitos->count() > 0)
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Disciplina</th>
      </tr>
    </thead>
    <tbody>
      @foreach($disciplina->preRequisitos as $preRequisito)
        <tr>
          <td> {{ $preRequisito->id }} </td>
          <td> {{ $preRequisito->nome_disciplina }}</td>
      @endforeach
    </tbody>
  </table>
@else
  <p class="text-muted">Nenhum pré-requisito definido para esta disciplina.</p>
@endif

<p><a href="{{ route('disciplinas.pre-requisitos', $disciplina->id) }}" class="btn btn-primary"><i class="fa fa-cog" aria-hidden="true" style="font-size:16px;"></i> Gerenciar Pré-requistos da Disciplina</a></p>
<hr>
<p><a href="/disciplinas" class="btn btn-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:16px;"></i> Voltar para Lista de Disciplinas</a></p>