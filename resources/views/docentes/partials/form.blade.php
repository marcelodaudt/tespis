<p>
    <label class="card-title required" for="nome_docente">Nome do Professor: </label>
    <input type="text" class="form-control" id="nome_docente" name="nome_docente" value="{{$docente->nome_docente}}">
</p>

<p>
    <label class="card-title required" for="sobrenome_docente">Sobrenome do Professor: </label>
    <input type="text" class="form-control" id="sobrenome_docente" name="sobrenome_docente" value="{{$docente->sobrenome_docente}}">
</p>

<p>
    <label class="card-title required" for="status">Situação: </label>
    <select name="status" class="form-control" id="status">
        <option value="" selected="">--- Selecione ---</option>
            @foreach ($docente->situacaoOptions() as $option)
                @if (old('status') == '' and isset($docente->status) )
                    <option value="{{$option}}" {{ ( $docente->status == $option) ? 'selected' : ''}}>
                        {{$option}}
                    </option>
                @else
                    <option value="{{$option}}" {{ ( old('status') == $option) ? 'selected' : ''}}>
                        {{$option}}
                    </option>
                @endif
            @endforeach
    </select>
</p>

<p>
    <label class="card-title required" for="id_departamento">Departamento: </label>
    <select name="id_departamento" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}" <?php if($docente->id_departamento == $departamento->id) { echo "selected";}?>>{{ $departamento->nome_departamento }}</option>
            @endforeach
    </select>
</p>

<p>
    <label class="card-title required" for="id_disciplina">Disciplinas: </label>
    <select name="id_disciplina" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}" <?php if($docente->id_disciplina == $disciplina->id) { echo "selected";}?>>{{ $disciplina->nome_disciplina }}</option>
            @endforeach
    </select>
</p>

<p><button type="submit">Salvar</button></p>
