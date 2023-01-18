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
        Schema::create('candidato_areas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("id_candidato")->references("id")->on("candidatos")->onDelete("cascade");
            $table->foreignId("id_area")->references("id")->on("areas")->onDelete("cascade");
            $table->integer("qtd");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_areas');
    }
};
