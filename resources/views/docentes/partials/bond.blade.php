<p>
    <label class="card-title required" for="id_disciplina">Disciplinas: </label>
    <select name="id_disciplina" class="form-control">
        <option value="" selected="">--- Selecione ---</option>
            @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina->id }}" <?php if($docente->id_disciplina == $disciplina->id) { echo "selected";}?>>{{ $disciplina->nome_disciplina }}</option>
            @endforeach
    </select>
</p>
<p>
    <button type="submit" class="btn btn-primary">
        Vincular Disciplina
    </button>
</p>
