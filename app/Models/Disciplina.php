<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * relacionamento com docentes
     */
    public function docentes(): HasOne
    {
        return $this->hasOne(Docente::class, 'id_disciplina', 'id');
    }
	
	/**
	public function docentes() {
		return $this->BelongsToMany(Docente::class, 'docente_disciplina', 'id_disciplina', 'id_docente')->withTimestamps();
		//return $this->BelongsToMany('App\Models\Docente', 'docente_disciplina', 'id_disciplina', 'id_docente')->withPivot()->withTimestamps();
	}
    */
}
