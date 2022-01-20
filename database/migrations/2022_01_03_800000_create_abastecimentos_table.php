<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->id('id');
            $table->timestamps();
            $table->float('preco_litro');
            $table->integer('litros_abast');
            $table->float('custo_total');
            $table->unsignedBigInteger('fk_posto');
            $table->unsignedBigInteger('fk_veiculo');

            $table->foreign('fk_posto')->references('id')->on('postos');
            $table->foreign('fk_veiculo')->references('id')->on('veiculos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abastecimentos');
    }
}
