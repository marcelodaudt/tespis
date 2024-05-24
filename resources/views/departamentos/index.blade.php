@extends('layouts.app')

@section('content')
  <h2>Departamentos Cadastrados</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome do Departamento</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($departamentos as $departamento)
        <tr>
          <td>{{ $departamento->nome_departamento }}</td>
          <td><a href="{{ route('departamentos.show', $departamento->id) }}">Exibir</a></td>
          <td><a href="{{ route('departamentos.edit', $departamento->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Alunos Cadastrados: {{ $departamentos->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection
