<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'grupo_id', 'op1', 'op2', 'op3', 'op4', 'op5'];
    //Campos que serão modificados no CRUD

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
        //função para buscar o grupo que a pergunta faz parte
    }
}
