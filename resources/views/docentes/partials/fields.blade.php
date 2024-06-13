<ul>
    <li><strong>Nome do Professor:</strong> {{ $docente->nome_docente ?? '' }}</li>
    <li><strong>Sobrenome do Professor:</strong> {{ $docente->sobrenome_docente ?? '' }}</li>
    <li><strong>Situação:</strong> {{ $docente->status ?? '' }}</li>
    <li><strong>Departamento:</strong> {{ $docente->id_departamento ?? '' }}</li>
  </ul>
<p><a href="/docentes/{{ $docente->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/docentes"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/docentes/{{ $docente->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
  </form>
</p>