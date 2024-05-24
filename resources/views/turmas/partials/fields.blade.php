<ul>
    <li>{{ $turma->id_curso ?? '' }}</li>
    <li>{{ $turma->periodo ?? '' }}</li>
    <li>{{ $turma->numero_alunos ?? '' }}</li>
    <li>{{ $turma->data_inicio ?? '' }}</li>
    <li>{{ $turma->data_final ?? '' }}</li>
    <li><a href="/turmas/{{ $turma->id }}/edit">Editar</a></li>
    <li>
      <form action="/turmas/{{ $turma->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul> 