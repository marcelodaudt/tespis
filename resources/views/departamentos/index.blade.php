@extends('layouts.app')

@section('content')
  <h2>Departamentos Cadastrados</h2>

  <form method="get" action="{{ $app_url }}/departamentos">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome do departamento">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>


  <br>
  <p><a href="/departamentos/create" class="btn btn-success"> Novo departamento </a></p>

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
          <td><a href="{{ route('departamentos.edit', $departamento->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('departamentos.show', $departamento->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$departamentos->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif

@endsection
