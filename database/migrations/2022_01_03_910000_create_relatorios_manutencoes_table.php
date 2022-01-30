<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_manutencoes', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('caminho_relatorio');
            $table->unsignedBigInteger('fk_usuario');

            $table->foreign('fk_usuario')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios_manutencoes');
    }
}
