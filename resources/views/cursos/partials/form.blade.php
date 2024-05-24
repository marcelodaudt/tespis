<label class="card-title required" for="nome_curso">Nome do Curso: </label>
<input type="text" class="form-control" id="nome_curso" name="nome_curso" value="{{$curso->nome_curso}}">

<label class="card-title required" for="id_departamento">Código do Departamento: </label>
<input type="text" class="form-control" id="id_departamento" name="id_departamento" value="{{$curso->id_departamento}}">

<button type="submit">Salvar</button>