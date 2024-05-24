<label class="card-title required" for="nome_disciplina">Nome da Disciplina: </label>
<input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" value="{{$disciplina->nome_disciplina}}">

<label class="card-title required" for="descricao">Descrição: </label>
<input type="text" class="form-control" id="descricao" name="descricao" value="{{$disciplina->descricao}}">

<label class="card-title required" for="id_departamento">Departamento: </label>
<input type="text" class="form-control" id="id_departamento" name="id_departamento" value="{{$disciplina->id_departamento}}">

<label class="card-title required" for="carga_horaria">Carga Horária: </label>
<input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="{{$disciplina->carga_horaria}}">

<label class="card-title required" for="numero_alunos">Número de Alunos: </label>
<input type="text" class="form-control" id="numero_alunos" name="numero_alunos" value="{{$disciplina->numero_alunos}}">

<button type="submit">Salvar</button>