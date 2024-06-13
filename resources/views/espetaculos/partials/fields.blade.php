<ul>
    <li><strong>Nome do Espetáculo:</strong> {{ $espetaculo->nome_espetaculo ?? '' }}</li>
    <li><strong>Ano:</strong> {{ $espetaculo->ano ?? '' }}</li>
    <li><strong>Termo:</strong> {{ $espetaculo->termo ?? '' }}</li>
    <li><strong>Turma:</strong> {{ $espetaculo->turma ?? '' }}</li>
    <li><strong>Categoria:</strong> {{ $espetaculo->categoria ?? '' }}</li>
  </ul>
  <p><a href="/espetaculos/{{ $espetaculo->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
  <p><a href="/espetaculos"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
  <p>
    <form action="/espetaculos/{{ $espetaculo->id }}" method="post">
      @csrf
      @method('delete')
      <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
    </form>
  </p>
