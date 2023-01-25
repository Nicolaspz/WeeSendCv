<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formaca_aca_candidato extends Model
{
    use HasFactory;
    protected $fillable = [
                'id_candidato',
                'id_formacao_acad',
                'qtd',

            ];
}
