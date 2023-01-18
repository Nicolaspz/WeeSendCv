<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experiencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'data_inicio',
        'data_fim',
        'descricao',
        'data_nasc',
    ];
}
