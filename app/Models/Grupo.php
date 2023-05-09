<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nome', 'questionario_id'];

    public function questionario()
    { // função para retornar o questionário que o grupo faz parte
        return $this->belongsTo(Questionario::class);
    }
    public function perguntas()
    { // função para retornar as perguntas que pertencem ao grupo
        return $this->hasMany(Pergunta::class);
    }
}
