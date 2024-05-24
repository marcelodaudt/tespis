<ul>
    <li>{{ $docente->nome_docente ?? '' }}</li>
    <li>{{ $docente->sobrenome_docente ?? '' }}</li>
    <li>{{ $docente->status ?? '' }}</li>
    <li>{{ $docente->id_departamento ?? '' }}</li>
    <li><a href="/docentes/{{ $docente->id }}/edit">Editar</a></li>
    <li>
      <form action="/docentes/{{ $docente->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul>