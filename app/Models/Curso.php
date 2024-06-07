<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Curso extends Model
{
    use HasFactory;
    //protected $guarded = ['id'];

    /**
     * @return HasOne
     */
    public function alunos(): HasOne
    {
        return $this->hasOne(Aluno::class, 'id_curso', 'id');
    }
}
