<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_user',
        'nome',
        'genero',
        'descricao',
        'data_nasc',
        'conntacto',
        'cv',
        'obs',
        'nivel_acade',
    ];
}
