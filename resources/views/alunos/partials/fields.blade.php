<ul>
    <li><strong>Número USP:</strong> {{ $aluno->numero_usp ?? '' }}</li>
    <li><strong>Nome do Aluno:</strong> {{ $aluno->nome ?? '' }}</li>
    <li><strong>Sobrenome do Aluno:</strong> {{ $aluno->sobrenome ?? '' }}</li>
    <li><strong>Utilização do Nome Social?</strong> {{ $aluno->status_utilizacao_nome_social ?? '' }}</li>
    <li><strong>Nome Social:</strong> {{ $aluno->nome_social ?? '' }}</li>
    <li><strong>CPF:</strong> {{ $aluno->cpf ?? '' }}</li>
    <li><strong>Situação:</strong> {{ $aluno->status ?? '' }}</li>
    <li><strong>Sexo:</strong> {{ $aluno->sexo ?? '' }}</li>
    <li><strong>Nome do Pai:</strong> {{ $aluno->nome_pai ?? '' }}</li>
    <li><strong>Nome da Mãe:</strong> {{ $aluno->nome_mae ?? '' }}</li>
    <li><strong>E-mail:</strong> {{ $aluno->email ?? '' }}</li>
    <li><strong>Whatsapp:</strong> {{ $aluno->whatsapp ?? '' }}</li>
    <li><strong>Turma:</strong> 
      @foreach($turmas as $turma)
        <?php if($aluno->id_turma == $turma->id) { echo $turma->numero_turma;}?>
      @endforeach
    </li>
    <li><strong>Curso:</strong>
      @foreach($cursos as $curso)
        <?php if($aluno->id_curso == $curso->id) { echo $curso->nome_curso;}?>
      @endforeach   
    </li>
  </ul>
<p><a href="/alunos/{{ $aluno->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/alunos"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/alunos/{{ $aluno->id }}" method="post">
  @csrf
  @method('delete')
  <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
  </form>
</p>