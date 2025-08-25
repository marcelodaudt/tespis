<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Curso extends Model
{
    use HasFactory;
    //protected $guarded = ['id'];

    /**
     * @return HasOne
     */

    /**
     * relacionamento com alunos
     */
    public function alunos(): HasOne {
        return $this->hasOne(Aluno::class, 'id_curso', 'id');
    }

    /**
     * relacionamento com turmas
     */
    public function turmas(): HasOne {
        return $this->hasOne(Turma::class, 'id_curso', 'id');
    }

        /**
     * relacionamento com departamentos
     */
	public function departamentos(): BelongsTo {
		return $this->belongsTo(Departamento::class, 'id_departamento', 'id');
	}
}
