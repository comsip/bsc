<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
