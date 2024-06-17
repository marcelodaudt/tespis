<ul>
    <li><strong>Número da Turma:</strong> {{ $turma->numero_turma ?? '' }}</li>  
    <li><strong>Curso:</strong>
      @foreach($cursos as $curso)
        <?php if($turma->id_curso == $curso->id) { echo $curso->nome_curso;}?>
      @endforeach   
    </li>
    <li><strong>Período:</strong> {{ $turma->periodo ?? '' }}</li>
    <li><strong>Número de alunos:</strong> {{ $turma->numero_alunos ?? '' }}</li>
    <li><strong>Data de início:</strong> {{ $turma->data_inicio ?? '' }}</li>
    <li><strong>Data final:</strong> {{ $turma->data_final ?? '' }}</li>
  </ul>
<p><a href="/turmas/{{ $turma->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/turmas"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/turmas/{{ $turma->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
  </form>
</p>