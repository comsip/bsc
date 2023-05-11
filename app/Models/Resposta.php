<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;
    protected $fillable = [
        'pergunta_id',
        'questionario_id',
        'grupo_id',
        'resposta',
        'valor',
    ];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }

    public function questionario()
    {
        return $this->belongsTo(Questionario::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
