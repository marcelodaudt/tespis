<label class="card-title required" for="numero_turma">Número da turma: </label>
<input type="text" class="form-control" id="numero_turma" name="numero_turma" value="{{$turma->numero_turma}}">

<label class="card-title required" for="id_curso">Código do curso: </label>
<input type="text" class="form-control" id="id_curso" name="id_curso" value="{{$turma->id_curso}}">

<label class="card-title required" for="periodo">Período: </label>
<input type="text" class="form-control" id="periodo" name="periodo" value="{{$turma->periodo}}">

<label class="card-title required" for="numero_alunos">Número de Alunos: </label>
<input type="text" class="form-control" id="numero_alunos" name="numero_alunos" value="{{$turma->numero_alunos}}">

<label class="card-title required" for="data_inicio">Data Início (AAAA-MM-DD): </label>
<input type="text" class="form-control" id="data_inicio" name="data_inicio" value="{{$turma->data_inicio}}">

<label class="card-title required" for="data_final">Data Final (AAAA-MM-DD): </label>
<input type="text" class="form-control" id="data_final" name="data_final" value="{{$turma->data_final}}">

<button type="submit">Salvar</button>