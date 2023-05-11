<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionario_id');
            $table->unsignedBigInteger('grupo_id');
            $table->unsignedBigInteger('pergunta_id');
            $table->string('nome');
            $table->string('email');
            $table->text('resposta');
            $table->bigInteger('valor')->nullable();
            $table->timestamps();
            $table->foreign('questionario_id')->references('id')->on('questionarios')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respostas', function (Blueprint $table) {
            $table->dropForeign(['questionario_id']);
            $table->dropForeign(['grupo_id']);
            $table->dropForeign(['pergunta_id']);
        });

        Schema::dropIfExists('respostas');
    }
}
