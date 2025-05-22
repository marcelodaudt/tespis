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

	public function departamentos(): BelongsTo {
		return $this->belongsTo(Departamento::class, 'id_departamento', 'id');
	}
}
