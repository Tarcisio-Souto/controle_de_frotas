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
            $table->id();
            $table->timestamps();
            $table->string('observacao');
            $table->string('custo_total');
            $table->unsignedBigInteger('fk_veiculo');
            $table->unsignedBigInteger('fk_oficina');
            $table->unsignedBigInteger('fk_servico');

            $table->foreign('fk_veiculo')->references('id_veiculo')->on('veiculos');
            $table->foreign('fk_oficina')->references('id_oficina')->on('oficinas');
            $table->foreign('fk_servico')->references('id_servico')->on('servicos');

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
