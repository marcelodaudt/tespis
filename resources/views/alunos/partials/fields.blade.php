<ul>
    <li><strong>Número USP:</strong> {{ $aluno->numero_usp ?? '' }}</li>
    <li><strong>Nome do Aluno:</strong> {{ $aluno->nome ?? '' }}</li>
    <li><strong>Sobrenome do Aluno:</strong> {{ $aluno->sobrenome ?? '' }}</li>
    <li><strong>Nome Social:</strong> {{ $aluno->nome_social ?? '' }}</li>
    <li><strong>CPF:</strong> {{ $aluno->cpf ?? '' }}</li>
    <li><strong>Status:</strong> {{ $aluno->status ?? '' }}</li>
    <li><strong>Sexo:</strong> {{ $aluno->sexo ?? '' }}</li>
    <li><strong>Nome do Pai:</strong> {{ $aluno->nome_pai ?? '' }}</li>
    <li><strong>Nome da Mãe:</strong> {{ $aluno->nome_mae ?? '' }}</li>
    <li><strong>E-mail:</strong> {{ $aluno->email ?? '' }}</li>
    <li><strong>Whatsapp:</strong> {{ $aluno->whatsapp ?? '' }}</li>
    <li><strong>Utilização do Nome Social?</strong> {{ $aluno->status_utilizacao_nome_social ?? '' }}</li>
    <li><strong>Turma:</strong> {{ $aluno->id_turma ?? '' }}</li>
    <li><strong>Curso:</strong> {{ $aluno->id_curso ?? '' }}</li>
  </ul>
<p><a href="/alunos/{{ $aluno->id }}/edit"><i class="fas fa-edit" style="font-size:26px;"></i> Editar</a></p>
<p>
  <button onclick="javascript:history.back()">Voltar</button>
  <form action="/alunos/{{ $aluno->id }}" method="post">
  @csrf
  @method('delete')
  <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
  </form>
</p>