<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_usp');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('cpf');
            $table->string('status');
            $table->string('sexo');
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('status_utilizacao_nome_social');
            $table->timestamps();
            //$table->integer('id_turma');
            //$table->foreign('id_turma')->references('id')->on('turmas')->onDelete('set null');
            //$table->integer('id_curso');
            //$table->foreign('id_curso')->references('id')->on('cursos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
