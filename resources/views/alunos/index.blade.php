@extends('layouts.app')

@section('content')
  <h2>Alunos Cadastrados</h2>

  {{$alunos->appends(request()->query())->links()}}
  
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
          <td><a href="{{ route('alunos.show', $aluno->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
          <td><a href="{{ route('alunos.edit', $aluno->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif

@endsection
