<ul>
    <li>{{ $aluno->numero_usp ?? '' }}</li>
    <li>{{ $aluno->nome ?? '' }}</li>
    <li>{{ $aluno->sobrenome ?? '' }}</li>
    <li>{{ $aluno->cpf ?? '' }}</li>
    <li>{{ $aluno->status ?? '' }}</li>
    <li>{{ $aluno->sexo ?? '' }}</li>
    <li>{{ $aluno->nome_pai ?? '' }}</li>
    <li>{{ $aluno->nome_mae ?? '' }}</li>
    <li>{{ $aluno->email ?? '' }}</li>
    <li>{{ $aluno->whatsapp ?? '' }}</li>
    <li>{{ $aluno->status_utilizacao_nome_social ?? '' }}</li>
    <li><a href="/alunos/{{ $aluno->id }}/edit">Editar</a></li>
    <li>
      <form action="/alunos/{{ $aluno->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul>