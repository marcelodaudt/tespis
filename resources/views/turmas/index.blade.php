@extends('layouts.app')

@section('content')
  <h2>Turmas Cadastradas</h2>

  <form method="get" action="{{ $app_url }}/turmas">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca pelo número da turma">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>

  <br>
  <p><a href="/turmas/create" class="btn btn-success"> Nova turma </a></p>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Turma</th>
        <th>Período</th>
        <th>Nº Alunos</th>
        <th>Data Início</th>
        <th>Data Final</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($turmas as $turma)
        <tr>
          <td>{{ $turma->numero_turma }}</td>
          <td>{{ $turma->periodo }}</td>
          <td>{{ $turma->numero_alunos }}</td>
          <td>{{ $turma->data_inicio }}</td>
          <td>{{ $turma->data_final }}</td>
          <td><a href="{{ route('turmas.edit', $turma->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('turmas.show', $turma->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$turmas->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
