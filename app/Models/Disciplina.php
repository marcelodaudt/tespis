<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsToMany(Docente::class, 'docente_disciplina',
                    'id_disciplina', 'id_docente')
                    ->withTimestamps();
    }

    public function docenteDisciplinas(): HasMany
    {
        return $this->hasMany(DocenteDisciplina::class);
    }

    /**
     * auto-relacionamento (0,n) disciplina depende de disciplina (pré-requisitos)
     * 
     */

    /** Disciplinas que são pré-requisitos desta disciplina */
    public function preRequisitos(): BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class, 'pre_requisitos', 
                    'id_disciplina', 'id_pre_requisito')
                    ->withTimestamps();
    }

    /** Disciplinas que têm esta como pré-requisito */
    public function disciplinasQueRequerem(): BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class, 'pre_requisitos', 
                    'id_pre_requisito', 'id_disciplina')
                    ->withTimestamps();
    }

    /** Relacionamento através da model PreRequisito */
    public function preRequisitosPivot(): HasMany
    {
        return $this->hasMany(PreRequisito::class, 'id_disciplina');
    }

    /** Scope para disciplinas sem pré-requisitos */
    public function scopeSemPreRequisitos($query)
    {
        return $query->doesntHave('preRequisitos');
    }

    /** Scope para disciplinas que são pré-requisitos de outras */
    public function scopeComoPreRequisito($query)
    {
        return $query->has('disciplinasQueRequerem');
    }

    /** Método para verificar se pode ser pré-requisito (evitar loops) */
    public function podeSerPreRequisito($disciplinaId): bool
    {
        if ($this->id == $disciplinaId) {
            return false; // Não pode ser pré-requisito de si mesma
        }

        // Verificar se já é pré-requisito
        $jaPreRequisito = $this->preRequisitos()
            ->where('id_pre_requisito', $disciplinaId)
            ->exists();

        return !$jaPreRequisito;
    }


}
