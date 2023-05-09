<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nome', 'questionario_id'];

    public function questionario()
    {
        return $this->belongsTo(Questionario::class);
    }
}
