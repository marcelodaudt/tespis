@extends('layouts.app')

@section('content')
  <h2>Espetáculos Cadastrados</h2>

  <form method="get" action="{{ $app_url }}/espetaculos">
    <div class="row">
      <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{Request()->busca}}" placeholder="Busca por nome do espetáculo">  
        <span class="input-group-btn">
          <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
      </div>
    </div>
  </form>


  <br>
  <p><a href="/espetaculos/create" class="btn btn-success"> Novo espetáculo </a></p>

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
          <td><a href="{{ route('espetaculos.edit', $espetaculo->id) }}"><i class="fas fa-edit" style="font-size:16px;"></i> Editar</a></td>
          <td><a href="{{ route('espetaculos.show', $espetaculo->id) }}"><i class="fa fa-eye" style="font-size:16px;"></i> Exibir</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <p>{{$espetaculos->appends(request()->query())->links()}}</p>

  @if(isset($msg))
    <script>
      alert("{{$msg}}");
    </script>
  @endif

@endsection
