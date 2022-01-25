<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManutencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->string('observacao');
            $table->string('custo_total');
            $table->date('data_manutencao');
            $table->unsignedBigInteger('fk_veiculo');
            $table->unsignedBigInteger('fk_oficina');
            $table->unsignedBigInteger('fk_servico');

            $table->foreign('fk_veiculo')->references('id')->on('veiculos');
            $table->foreign('fk_oficina')->references('id')->on('oficinas');
            $table->foreign('fk_servico')->references('id')->on('servicos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manutencoes');
    }
}
