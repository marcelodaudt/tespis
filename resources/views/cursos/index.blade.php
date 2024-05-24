@extends('layouts.app')

@section('content')
  <h2>Cursos Cadastrados</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Curso</th>
        <th>Departamento</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cursos as $curso)
        <tr>
          <td>{{ $curso->nome_curso }}</td>
          <td>{{ $curso->id_departamento }}</td>
          <td><a href="{{ route('cursos.show', $curso->id) }}">Exibir</a></td>
          <td><a href="{{ route('cursos.edit', $curso->id) }}">Editar</a></td>
        </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total de Cursos Cadastrados: {{ $cursos->count() }}</td>
      </tr>
    </tfoot>
  </table>
  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection