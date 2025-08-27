<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    use HasFactory;

    public function situacaoOptions(){
        return [
            'Ativo',
            'Inativo',
            'Aposentado'
        ];
    }

    /**
     * relacionamento com departamentos
     */
	public function departamentos(): BelongsTo {
		return $this->belongsTo(Departamento::class, 'id_departamento', 'id');
	}

    /**
     * relacionamento docentes e disciplinas
     */
    public function disciplinas(): BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class, 'docente_disciplina', 'id_docente', 'id_disciplina')
                    ->withTimestamps();
    }
    
    public function docenteDisciplinas(): HasMany
    {
        return $this->hasMany(DocenteDisciplina::class);
    }

}
