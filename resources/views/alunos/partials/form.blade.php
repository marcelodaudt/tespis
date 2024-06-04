<label class="card-title required" for="numero_usp">Número USP: </label>
<input type="text" class="form-control" id="numero_usp" name="numero_usp" value="{{$aluno->numero_usp}}">

<label class="card-title required" for="nome">Nome do Aluno: </label>
<input type="text" class="form-control" id="nome" name="nome" value="{{$aluno->nome}}">

<label class="card-title required" for="sobrenome">Sobrenome do Aluno: </label>
<input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{$aluno->sobrenome}}">

<label class="card-title required" for="nome_social">Nome Social: </label>
<input type="text" class="form-control" id="nome_social" name="nome_social" value="{{$aluno->nome_social}}">

<label class="card-title required" for="cpf">CPF: </label>
<input type="text" class="form-control" id="cpf" name="cpf" value="{{$aluno->cpf}}">

<label class="card-title required" for="status">Status: </label>
<input type="text" class="form-control" id="status" name="status" value="{{$aluno->status}}">

<label class="card-title required" for="sexo">Sexo: </label>
<input type="text" class="form-control" id="sexo" name="sexo" value="{{$aluno->sexo}}">

<label class="card-title required" for="nome_pai">Nome do Pai: </label>
<input type="text" class="form-control" id="nome_pai" name="nome_pai" value="{{$aluno->nome_pai}}">

<label class="card-title required" for="nome_mae">Nome da Mãe: </label>
<input type="text" class="form-control" id="nome_mae" name="nome_mae" value="{{$aluno->nome_mae}}">

<label class="card-title required" for="email">E-mail: </label>
<input type="text" class="form-control" id="email" name="email" value="{{$aluno->email}}">

<label class="card-title required" for="whatsapp">Whatsapp: </label>
<input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$aluno->whatsapp}}">

<label class="card-title required" for="status_utilizacao_nome_social">Utilização do Nome Social? </label>
<input type="text" class="form-control" id="status_utilizacao_nome_social" name="status_utilizacao_nome_social" value="{{$aluno->status_utilizacao_nome_social}}">

<label class="card-title required" for="id_turma">Turma: </label>
<input type="text" class="form-control" id="id_turma" name="id_turma" value="{{$aluno->id_turma}}">

<label class="card-title required" for="id_curso">Curso: </label>
<input type="text" class="form-control" id="id_curso" name="id_curso" value="{{$aluno->id_curso}}">

<button type="submit">Salvar</button>