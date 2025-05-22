<p>
    <label class="card-title required" for="numero_turma">Número da turma: </label>
    <input type="text" class="form-control" id="numero_turma" name="numero_turma" value="{{$turma->numero_turma}}">
</p>

<p>
    <label class="card-title required" for="id_curso">Curso: </label>
    <select name="id_curso" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" <?php if($turma->id_curso == $curso->id) { echo "selected";}?>>{{ $curso->nome_curso }}</option>
            @endforeach                 
    </select>
</p>

<p>
    <label class="card-title required" for="periodo">Período: </label>
    <input type="text" class="form-control" id="periodo" name="periodo" value="{{$turma->periodo}}">
</p>

<p>
    <label class="card-title required" for="numero_alunos">Número de Alunos: </label>
    <input type="text" class="form-control" id="numero_alunos" name="numero_alunos" value="{{$turma->numero_alunos}}">
</p>

<p>
    <label class="card-title required" for="data_inicio">Data Início (DD/MM/AAAA): </label>
    <input type="text" class="form-control datepicker" id="data_inicio" name="data_inicio" value="{{$turma->data_inicio}}">
</p>

<p>
    <label class="card-title required" for="data_final">Data Final (DD/MM/AAAA): </label>
    <input type="text" class="form-control datepicker" id="data_final" name="data_final" value="{{$turma->data_final}}">
</p>

<p><button type="submit">Salvar</button></p>
