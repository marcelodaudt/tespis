<p>
    <label class="card-title required" for="nome_espetaculo">Nome do Espetáculo: </label>
    <input type="text" class="form-control" id="nome_espetaculo" name="nome_espetaculo" value="{{$espetaculo->nome_espetaculo}}">
</p>

<p>
    <label class="card-title required" for="ano">Ano da Apresentação: </label>
    <input type="text" class="form-control" id="ano" name="ano" value="{{$espetaculo->ano}}">
</p>

<p>
    <label class="card-title required" for="termo">Termo: </label>
    <input type="text" class="form-control" id="termo" name="termo" value="{{$espetaculo->termo}}">
</p>

<p>
    <label class="card-title required" for="id_turma">Turma: </label>
    <select name="id_turma" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" <?php if($espetaculo->id_turma == $turma->id) { echo "selected";}?>>{{ $turma->numero_turma }}</option>
            @endforeach                 
    </select>
</p>

<p>
    <label class="card-title required" for="categoria">Categoria: </label>
    <select name="categoria" class="form-control" id="categoria">
        <option value="" selected="">--- Selecione ---</option>
            @foreach ($espetaculo->categoriaOptions() as $option)
                @if (old('categoria') == '' and isset($espetaculo->categoria) )
                    <option value="{{$option}}" {{ ( $espetaculo->categoria == $option) ? 'selected' : ''}}>
                        {{$option}}
                    </option>
                @else
                    <option value="{{$option}}" {{ ( old('categoria') == $option) ? 'selected' : ''}}>
                        {{$option}}
                    </option>
                @endif
            @endforeach
    </select>
</p>

<p><button type="submit">Salvar</button></p>
