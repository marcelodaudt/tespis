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
<p><a href="/disciplinas/{{ $disciplina->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/disciplinas"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/disciplinas/{{ $disciplina->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
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