@extends('layouts.app')

@section('content')
  <h2>Alunos Cadastrados</h2>
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
          <td><a href="{{ route('alunos.show', $aluno->id) }}">Exibir</a></td>
          <td><a href="{{ route('alunos.edit', $aluno->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Alunos Cadastrados: {{ $alunos->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
