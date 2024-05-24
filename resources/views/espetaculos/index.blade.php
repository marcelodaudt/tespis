@extends('layouts.app')

@section('content')
  <h2>Espetáculos Cadastrados</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Ano</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($espetaculos as $espetaculo)
        <tr>
          <td>{{ $espetaculo->nome_espetaculo }}</td>
          <td>{{ $espetaculo->ano }}</td>
          <td><a href="{{ route('alunos.show', $espetaculo->id) }}">Exibir</a></td>
          <td><a href="{{ route('alunos.edit', $espetaculo->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Espetáculos Cadastrados: {{ $espetaculos->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
