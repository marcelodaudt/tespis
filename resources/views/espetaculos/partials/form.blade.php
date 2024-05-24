<label class="card-title required" for="nome_espetaculo">Nome do Espetáculo: </label>
<input type="text" class="form-control" id="nome_espetaculo" name="nome_espetaculo" value="{{$espetaculo->nome_espetaculo}}">

<label class="card-title required" for="ano">Ano da Apresentação: </label>
<input type="text" class="form-control" id="ano" name="ano" value="{{$espetaculo->ano}}">

<label class="card-title required" for="tempo">Tempo (duração): </label>
<input type="text" class="form-control" id="tempo" name="tempo" value="{{$espetaculo->tempo}}">

<label class="card-title required" for="tipo">Tipo: </label>
<input type="text" class="form-control" id="tipo" name="tipo" value="{{$espetaculo->tipo}}">

<button type="submit">Salvar</button>