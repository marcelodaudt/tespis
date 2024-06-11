<ul>
  <li><strong>Código do Departamento:</strong>{{ $departamento->id ?? '' }}</li>
  <li><strong>Nome do Departamento:</strong> {{ $departamento->nome_departamento ?? '' }}</li>
</ul>
  <p><a href="/departamentos/{{ $departamento->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
  <p><a href="/departamentos"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
  <p>
    <form action="/departamentos/{{ $departamento->id }}" method="post">
      @csrf
      @method('delete')
      <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
    </form>
  </p>
