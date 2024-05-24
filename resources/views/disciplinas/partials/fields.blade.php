<ul>
    <li>{{ $disciplina->nome_disciplina ?? '' }}</li>
    <li>{{ $disciplina->descricao ?? '' }}</li>
    <li>{{ $disciplina->id_departamento ?? '' }}</li>
    <li>{{ $disciplina->carga_horaria ?? '' }}</li>
    <li>{{ $disciplina->numero_alunos ?? '' }}</li>
    <li><a href="/disciplinas/{{ $disciplina->id }}/edit">Editar</a></li>
    <li>
      <form action="/disciplinas/{{ $disciplina->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul>