@extends('layouts.app')

@section('content')
  <h2>Alunos Cadastrados</h2>

  <form method="get" action="{{ $app_url }}/alunos">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por número USP ou nome do/a aluno/a">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>

  <br>
  <p><a href="/alunos/create" class="btn btn-success"> Novo/a aluno/a </a></p>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nº USP</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($alunos as $aluno)
        <tr>
          <td>{{ $aluno->numero_usp }}</td>
          <td>{{ $aluno->nome }}</td>
          <td>{{ $aluno->sobrenome }}</td>
          <td><a href="{{ route('alunos.edit', $aluno->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('alunos.show', $aluno->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$alunos->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif

@endsection
