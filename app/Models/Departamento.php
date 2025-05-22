<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departamento extends Model
{
    use HasFactory;

    public function docentes(): HasOne
    {
        return $this->hasOne(Docente::class, 'id_departamento', 'id');
    }

    public function cursos(): HasOne
    {
        return $this->hasOne(Curso::class, 'id_departamento', 'id');
    }

    public function disciplinas(): HasOne
    {
        return $this->hasOne(Disciplina::class, 'id_departamento', 'id');
    }
}
