<p>
    <label class="card-title required" for="nome_curso">Nome do Curso: </label>
    <input type="text" class="form-control" id="nome_curso" name="nome_curso" value="{{$curso->nome_curso}}">
</p>

<p>
    <label class="card-title required" for="id_departamento">Departamento: </label>
    <select name="id_departamento" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}" <?php if($curso->id_departamento == $departamento->id) { echo "selected";}?>>{{ $departamento->nome_departamento }}</option>
            @endforeach                 
    </select>
</p>

<p><button type="submit">Salvar</button></p>
