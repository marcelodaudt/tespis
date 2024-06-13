<ul>
  <li><strong>Nome do Curso:</strong> {{ $curso->nome_curso ?? '' }}</li>
  <li><strong>Depertamento:</strong> {{ $curso->id_departamento ?? '' }}</li>
</ul>
<p><a href="/cursos/{{ $curso->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/cursos"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/cursos/{{ $curso->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
  </form>
</p>