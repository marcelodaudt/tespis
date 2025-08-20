<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * relacionamento com disciplinas
     */
    public function disciplinas(): BelongsTo {
        return $this->belongsTo(Disciplina::class, 'id_disciplina', 'id');
    }
    /**
    public function disciplinas() {
		return $this->BelongsToMany(related: Disciplina::class, table: 'docente_disciplina', foreignPivotKey: 'id_docente', relatedPivotKey: 'id_disciplina')->withTimestamps();
        //return $this->BelongsToMany('App\Models\Disciplina', 'docente_disciplina', 'id_disciplina', 'id_docente')->withPivot()->withTimestamps();
	}
    */
}
