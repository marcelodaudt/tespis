@extends('layouts.app')

@section('content')
  <h2>Cursos Cadastrados</h2>

  <form method="get" action="{{ $app_url }}/cursos">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome do curso">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>


  <br>
  <p><a href="/cursos/create" class="btn btn-success"> Novo curso </a></p>

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
          <td><a href="{{ route('cursos.edit', $curso->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('cursos.show', $curso->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$cursos->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif

@endsection