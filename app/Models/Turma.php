<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

	public function espetaculos(): HasOne {
		return $this->hasOne(Espetaculo::class, 'id_turma', 'id');
	}

    public function getDataInicioAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

	public function setDataInicioAttribute($value) {
        $this->attributes['data_inicio'] = implode('-',array_reverse(explode('/',$value)));
    }

	public function getDataFinalAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataFinalAttribute($value) {
        $this->attributes['data_final'] = implode('-',array_reverse(explode('/',$value)));
    }
}
