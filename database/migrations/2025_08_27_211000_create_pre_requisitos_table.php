<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_requisitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_disciplina');
            $table->foreignId('id_pre_requisito');
            //$table->foreignId('id_disciplina')->constrained()->onDelete('cascade');
            //$table->foreignId('id_pre_requisito')->constrained('disciplinas')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['id_disciplina', 'id_pre_requisito']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre_requisitos');
    }
}
