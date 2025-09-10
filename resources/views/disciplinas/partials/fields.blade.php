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
<p><i class="fas fa-edit" style="font-size:36px;"></i><a href="/disciplinas/{{ $disciplina->id }}/edit"> Editar</a></p>
<p><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i><a href="/disciplinas"> Voltar</a></p>
<p>
  <form action="/disciplinas/{{ $disciplina->id }}" method="post">
    @csrf
    @method('delete')
    <p><i class="fa fa-trash" aria-hidden="true" style="font-size:36px;"></i>&nbsp;
    <button type="submit" onclick="return confirm('Tem certeza da exclusão da disciplina?');">Excluir disciplina</button></p>
  </form>
</p>

<h3>Docentes vinculados a disciplina: {{ $disciplina->nome_disciplina }}</h3>

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

<p><a href="{{ route('disciplinas.pre-requisitos', $disciplina->id) }}" class="btn btn-primary">
 Gerenciar Pré-requistos da Disciplina
</a></p>