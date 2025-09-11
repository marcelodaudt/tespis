<p>
    <label class="card-title required" for="nome_disciplina">Nome da Disciplina: </label>
    <input type="text" class="form-control" id="nome_disciplina" name="nome_disciplina" value="{{$disciplina->nome_disciplina}}">
</p>

<p>
    <label class="card-title required" for="descricao">Descrição: </label>
    <input type="text" class="form-control" id="descricao" name="descricao" value="{{$disciplina->descricao}}">
</p>

<p>
    <label class="card-title required" for="id_departamento">Departamento: </label>
    <select name="id_departamento" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}" <?php if($disciplina->id_departamento == $departamento->id) { echo "selected";}?>>{{ $departamento->nome_departamento }}</option>
            @endforeach                 
    </select>
</p>

<p>
    <label class="card-title required" for="carga_horaria">Carga Horária: </label>
    <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="{{$disciplina->carga_horaria}}">
</p>

<p>
    <label class="card-title required" for="numero_alunos">Número de Alunos: </label>
    <input type="text" class="form-control" id="numero_alunos" name="numero_alunos" value="{{$disciplina->numero_alunos}}">
</p>

<p>
    <a href="javascript:history.back()" class="btn btn-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:16px;"></i> Voltar</a>
    <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true" style="font-size:16px;"></i> Salvar</button>
</p>