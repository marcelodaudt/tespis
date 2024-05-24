<ul>
    <li>{{ $departamento->id ?? '' }}</li>
    <li>{{ $departamento->nome_departamento ?? '' }}</li>
    <li><a href="/departamentos/{{ $departamento->id }}/edit">Editar</a></li>
    <li>
      <form action="/departamentos/{{ $departamento->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul>