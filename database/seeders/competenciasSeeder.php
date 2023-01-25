<?php

namespace Database\Seeders;

use App\Models\competencias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class competenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        competencias::create(['nome_competencia'=>"Java"]);
        competencias::create(['nome_competencia'=>"Auditor"]);
        competencias::create(['nome_competencia'=>"Inglês"]);
        competencias::create(['nome_competencia'=>"Call Center"]);
        competencias::create(['nome_competencia'=>"Angular"]);
        competencias::create(['nome_competencia'=>"Laravel"]);
        competencias::create(['nome_competencia'=>"Python"]);
        competencias::create(['nome_competencia'=>"Francês"]);
        competencias::create(['nome_competencia'=>"Orador"]);
        competencias::create(['nome_competencia'=>"Managment"]);
        competencias::create(['nome_competencia'=>"Serviços Gerais"]);
        competencias::create(['nome_competencia'=>"Supervisor"]);
        competencias::create(['nome_competencia'=>"Avalista"]);
        competencias::create(['nome_competencia'=>"Contablidae"]);
        competencias::create(['nome_competencia'=>"RH"]);
        competencias::create(['nome_competencia'=>"Markting"]);

    }
}
