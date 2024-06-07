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
<select name="status" class="form-control" id="status">
    <option value="" selected="">--- Selecione ---</option>
        @foreach ($aluno->situacaoOptions() as $option)
            @if (old('status') == '' and isset($aluno->status) )
                <option value="{{$option}}" {{ ( $aluno->status == $option) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @else
                <option value="{{$option}}" {{ ( old('status') == $option) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @endif
        @endforeach
</select>

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
<select name="status_utilizacao_nome_social" class="form-control" id="status_utilizacao_nome_social">
    <option value="" selected="">--- Selecione ---</option>
        @foreach ($aluno->statusUtilizacaoNomeSocialOptions() as $option)
            @if (old('status_utilizacao_nome_social') == '' and isset($aluno->status_utilizacao_nome_social) )
                <option value="{{$option}}" {{ ( $aluno->status_utilizacao_nome_social == $option) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @else
                <option value="{{$option}}" {{ ( old('status_utilizacao_nome_social') == $option) ? 'selected' : ''}}>
                    {{$option}}
                </option>
            @endif
        @endforeach
</select>

<label class="card-title required" for="id_turma">Turma: </label>
<input type="text" class="form-control" id="id_turma" name="id_turma" value="{{$aluno->id_turma}}">

<label class="card-title required" for="id_curso">Curso: </label>
<select name="id_curso" class="form-control">
    <option value="" selected="">--- Selecione ---</option>
        @foreach($cursos as $curso)
            <option value="{{ $curso->id }}" <?php if($aluno->id_curso == $curso->id) { echo "selected";}?>>{{ $curso->nome_curso }}</option>
        @endforeach                 
</select>

<button type="submit">Salvar</button>