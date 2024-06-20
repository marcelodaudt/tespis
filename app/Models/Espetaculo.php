<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Espetaculo extends Model
{
    use HasFactory;

    public function categoriaOptions(){
        return [
            'abertura de processo',
            'aula aberta',
            'CAC',
            'espetáculo',
            'estágio',
            'estágio investigativo',
            'estágio profissionalizante',
            'evento',
            'exame de interpretação',
            'exame público',
            'exames públicos',
            'exame público de interpretação',
            'exercício',
            'externo',
            'fetival',
            'filme',
            'institucional',
            'manual do calouro',
            'mostra',
            'pré-oficina',
            'projeto externo'
        ];
    }

    public function turmas(): BelongsTo {
		return $this->belongsTo(Turma::class, 'id_turma', 'id');
	}
}
