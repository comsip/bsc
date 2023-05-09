<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'grupo_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
