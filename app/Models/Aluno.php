<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    public function statusUtilizacaoNomeSocialOptions(){
        return [
            'Sim',
            'Não'
        ];
    }

    public function situacaoOptions(){
        return [
            'Matriculado',
            'Trancado',
            'Formado',
            'Deve PFC',
            'Desistente'
        ];
    }

    /**
     * @return BelongsTo
     */
	public function cursos(): BelongsTo {
		return $this->belongsTo(Curso::class, 'id_curso', 'id');
	}
}
