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
        Schema::create('formacao_academicas', function (Blueprint $table) {
            $table->id();
            $table->string("pais");
            $table->string("descricao");
            $table->string("titulo");
            $table->string("instituicao");
            $table->string("curso");
            $table->string("estado");
            $table->date("data_inicio");
            $table->date("data_fim")->nullable();
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
        Schema::dropIfExists('formacao_academicas');
    }
};
