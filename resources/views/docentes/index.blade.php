@extends('layouts.app')

@section('content')
  <h2>Professores Cadastrados</h2>

  <form method="get" action="{{ $app_url }}/docentes">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome ou sobrenome do Professor">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>

  <br>
  <p><a href="/docentes/create" class="btn btn-success"> Novo(a) Professor(a) </a></p>

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
          <td><a href="{{ route('docentes.edit', $docente->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('docentes.show', $docente->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$docentes->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif
@endsection