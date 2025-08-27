<ul>
    <li><strong>Nome do Professor:</strong> {{ $docente->nome_docente ?? '' }}</li>
    <li><strong>Sobrenome do Professor:</strong> {{ $docente->sobrenome_docente ?? '' }}</li>
    <li><strong>Situação:</strong> {{ $docente->status ?? '' }}</li>
    <li><strong>Departamento:</strong>
      @foreach($departamentos as $departamento)
        <?php if($docente->id_departamento == $departamento->id) { echo $departamento->nome_departamento;}?>
      @endforeach   
    </li>
  </ul>
<p><a href="/docentes/{{ $docente->id }}/edit"><i class="fas fa-edit" style="font-size:36px;"></i> Editar</a></p>
<p><a href="/docentes"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:36px;"></i> Voltar</a></p>
<p>
  <form action="/docentes/{{ $docente->id }}" method="post">
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza?');">Excluir Docente</button>
  </form>
</p>

<!-- docentes/show.blade.php -->
<h3>Disciplinas do Docente: {{ $docente->nome_docente }} {{ $docente->sobrenome_docente }}</h3>

@if($docente->disciplinas->count() > 0)
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Disciplina</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach($docente->disciplinas as $disciplina)
        <tr>
          <td> {{ $disciplina->id }} </td>
          <td> {{ $disciplina->nome_disciplina }} </td>
          <td>
            <form action="{{ route('docentes.disciplinas.destroy', [$docente->id, $disciplina->id]) }}" 
              method="POST" style="display:inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" 
                onclick="return confirm('Remover este vínculo?')">
                Remover
              </button>
            </form>
          </td>
      @endforeach
    </tbody>
  </table>
@else
    <p>Nenhuma disciplina vinculada.</p>
@endif

<a href="{{ route('docentes.vincular-disciplinas', $docente->id) }}" class="btn btn-primary">
  Vincular Disciplinas
</a>