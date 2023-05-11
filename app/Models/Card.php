<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    protected $fillable = [
        'imagem',
        'titulo',
        'descricao',
        'classe',
        'valor'
    ];
}
