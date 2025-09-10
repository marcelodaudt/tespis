<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreRequisito extends Model
{
    use HasFactory;

    protected $table = 'pre_requisitos';
    
    protected $fillable = ['id_disciplina', 'id_pre_requisito'];

    public function disciplina(): BelongsTo
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function preRequisito(): BelongsTo
    {
        return $this->belongsTo(Disciplina::class, 'id_pre_requisito');
    }
}
