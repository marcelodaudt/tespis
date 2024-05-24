@extends('layouts.app')

@section('content')
  <h2>Professores Cadastrados</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Departamento</th>
        <th>Status</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($docentes as $docente)
        <tr>
          <td>{{ $docente->nome_docente }}</td>
          <td>{{ $docente->sobrenome_docente }}</td>
          <td>{{ $docente->id_departamento }}</td>
          <td>{{ $docente->status }}</td>
          <td><a href="{{ route('docentes.show', $docente->id) }}">Exibir</a></td>
          <td><a href="{{ route('docentes.edit', $docente->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Professores Cadastrados: {{ $docentes->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection