<ul>
  <li>{{ $curso->nome_curso ?? '' }}</li>
  <li>{{ $curso->id_departamento ?? '' }}</li>
  <li><a href="/cursos/{{ $curso->id }}/edit">Editar</a></li>
  <li>
    <form action="/cursos/{{ $curso->id }}" method="post">
      @csrf
      @method('delete')
      <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
    </form>
  </li>
</ul>  