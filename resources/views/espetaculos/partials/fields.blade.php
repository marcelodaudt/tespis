<ul>
    <li>{{ $espetaculo->nome_espetaculo ?? '' }}</li>
    <li>{{ $espetaculo->ano ?? '' }}</li>
    <li>{{ $espetaculo->tempo ?? '' }}</li>
    <li>{{ $espetaculo->tipo ?? '' }}</li>
    <li><a href="/espetaculos/{{ $espetaculo->id }}/edit">Editar</a></li>
    <li>
      <form action="/espetaculos/{{ $espetaculo->id }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
      </form>
    </li>
  </ul>