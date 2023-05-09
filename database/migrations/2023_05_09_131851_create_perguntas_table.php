<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao'); // Cabeçalho da perguntas
            $table->string('op1'); // opção de resposta da pergunta
            $table->string('op2'); // opção de resposta da pergunta
            $table->string('op3'); // opção de resposta da pergunta
            $table->string('op4'); // opção de resposta da pergunta
            $table->string('op5')->nullable(); // opção de resposta da pergunta esta pode ser nula
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
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
        Schema::table('perguntas', function (Blueprint $table) {
            $table->dropForeign(['grupo_id']);
        });

        Schema::dropIfExists('perguntas');
    }
}
