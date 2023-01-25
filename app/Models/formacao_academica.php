<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formacao_academica extends Model
{
    use HasFactory;
    protected $fillable = [
         'pais',
         'descricao',
         'titulo',
         'instituicao',
         'curso',
         'estado',
         'data_inicio',
         'data_fim',
    ];
}
