<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_turma');
            $table->integer('id_curso');
            $table->string('periodo');
            $table->integer('numero_alunos');
            $table->date('data_inicio');
            $table->date('data_final');
            $table->timestamps();
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
        Schema::dropIfExists('turmas');
    }
}
