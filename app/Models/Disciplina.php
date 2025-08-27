<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Disciplina extends Model
{
    use HasFactory;

    /**
     * relacionamento com departamentos
     */
	public function departamentos(): HasOne 
	{
		return $this->hasOne(Departamento::class, 'id_departamento', 'id');
	}

    /**
     * relacionamento disciplinas e docentes
     */
    public function docentes(): BelongsToMany
    {
        return $this->belongsToMany(Docente::class, 'docente_disciplina', 'id_disciplina', 'id_docente')
                    ->withTimestamps();
    }

    public function docenteDisciplinas(): HasMany
    {
        return $this->hasMany(DocenteDisciplina::class);
    }
}
