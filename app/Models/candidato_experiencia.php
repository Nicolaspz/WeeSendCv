<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidato_experiencia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_candidato',
        'id_experiencia',
        'qtd',
    ];
}
