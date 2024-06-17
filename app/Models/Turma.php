<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Turma extends Model
{
    use HasFactory;

	public function cursos(): BelongsTo {
		return $this->belongsTo(Curso::class, 'id_curso', 'id');
	}

	public function alunos(): BelongsTo {
		return $this->belongsTo(Aluno::class, 'id_curso', 'id');
	}
}
