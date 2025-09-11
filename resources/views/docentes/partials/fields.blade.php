<ul>
    <li><strong>Nome do Docente:</strong> {{ $docente->nome_docente ?? '' }} {{ $docente->sobrenome_docente ?? '' }}</li>
    <li><strong>Situação:</strong> {{ $docente->status ?? '' }}</li>
    <li><strong>Departamento:</strong>
      @foreach($departamentos as $departamento)
        <?php if($docente->id_departamento == $departamento->id) { echo $departamento->nome_departamento;}?>
      @endforeach   
    </li>
  </ul>
<p>
  <form action="/docentes/{{ $docente->id }}" method="post">
    <a href="/docentes/{{ $docente->id }}/edit" class="btn btn-primary"><i class="fas fa-edit" style="font-size:16px;"></i> Editar Docente</a>
    @csrf
    @method('delete')
    <button type="submit" onclick="return confirm('Tem certeza da exclusão do docente?');" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true" style="font-size:16px;"></i> Excluir Docente</button>
  </form>
</p>

<hr>
<h4>Disciplinas Vinculadas ao Docente:</h4>

@if($docente->disciplinas->count() > 0)
  <table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Disciplina</th>
      </tr>
    </thead>
    <tbody>
      @foreach($docente->disciplinas as $disciplina)
        <tr>
          <td> {{ $disciplina->id }} </td>
          <td> {{ $disciplina->nome_disciplina }} </td>
      @endforeach
    </tbody>
  </table>
@else
    <p>Nenhuma disciplina vinculada.</p>
@endif
<p>
  <a href="{{ route('docentes.vincular-disciplinas', $docente->id) }}" class="btn btn-primary"><i class="fa fa-cog" aria-hidden="true" style="font-size:16px;"></i> Gerenciar Disciplinas do Docente</a>
</p>
<hr>
<p><a href="/docentes" class="btn btn-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:16px;"></i> Voltar para Lista de Docentes</a></p>