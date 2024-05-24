@extends('layouts.app')

@section('content')
  <h2>Turmas Cadastradas</h2>
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
          <td>{{ $turma->id }}</td>
          <td>{{ $turma->periodo }}</td>
          <td>{{ $turma->numero_alunos }}</td>
          <td>{{ $turma->data_inicio }}</td>
          <td>{{ $turma->data_final }}</td>
          <td><a href="{{ route('turmas.show', $turma->id) }}">Exibir</a></td>
          <td><a href="{{ route('turmas.edit', $turma->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Cursos Cadastrados: {{ $turmas->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
