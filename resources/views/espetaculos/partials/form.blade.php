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
    <label class="card-title required" for="turma">Turma: </label>
    <input type="text" class="form-control" id="turma" name="turma" value="{{$espetaculo->turma}}">
</p>

<p>
    <label class="card-title required" for="categoria">Categoria: </label>
    <input type="text" class="form-control" id="categoria" name="ticategoriapo" value="{{$espetaculo->categoria}}">
</p>

<p><button type="submit">Salvar</button></p>
