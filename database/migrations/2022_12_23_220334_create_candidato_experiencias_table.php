<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_experiencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_candidato")->references("id")->on("candidatos")->onDelete("cascade");
            $table->foreignId("id_experiencia")->references("id")->on("experiencias")->onDelete("cascade");
            $table->integer("qtd");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_experiencias');
    }
};
