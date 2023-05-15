<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'questionario_id',
        'grupo_id',
        'pergunta_id',
        'user_id',
        'resposta',
    ];
}
