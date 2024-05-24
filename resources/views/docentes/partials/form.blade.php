<label class="card-title required" for="nome_docente">Nome do Professor: </label>
<input type="text" class="form-control" id="nome_docente" name="nome_docente" value="{{$docente->nome_docente}}">

<label class="card-title required" for="sobrenome_docente">Sobrenome do Professor: </label>
<input type="text" class="form-control" id="sobrenome_docente" name="sobrenome_docente" value="{{$docente->sobrenome_docente}}">

<label class="card-title required" for="status">Status (A ou D): </label>
<input type="text" class="form-control" id="status" name="status" value="{{$docente->status}}">

<label class="card-title required" for="id_departamento">Departamento: </label>
<input type="text" class="form-control" id="id_departamento" name="id_departamento" value="{{$docente->id_departamento}}">

<button type="submit">Salvar</button>