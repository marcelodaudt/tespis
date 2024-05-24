@extends('layouts.app')

@section('content')
  <h2>Disciplinas Cadastradas</h2>
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
          <td><a href="{{ route('disciplinas.show', $disciplina->id) }}">Exibir</a></td>
          <td><a href="{{ route('disciplinas.edit', $disciplina->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Disciplinas Cadastradas: {{ $disciplinas->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
