@extends('layouts.app')

@section('content')
  <h2>Disciplinas Cadastradas</h2>

  <form method="get" action="{{ $app_url }}/disciplinas">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome da disciplina">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>


  <br>
  <p><a href="/disciplinas/create" class="btn btn-success"> Nova disciplina </a></p>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Departamento</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($disciplinas as $disciplina)
        <tr>
          <td>{{ $disciplina->nome_disciplina }}</td>
          <td>{{ $disciplina->descricao }}</td>
          <td>{{ $disciplina->id_departamento }}</td>
          <td><a href="{{ route('disciplinas.edit', $disciplina->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('disciplinas.show', $disciplina->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$disciplinas->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
