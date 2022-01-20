<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrocasOleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trocas__oleos', function (Blueprint $table) {
            
            $table->id('id');
            $table->timestamps();
            $table->string('nome_oleo');
            $table->tinyInteger('filtro_oleo');
            $table->tinyInteger('filtro_combustivel');
            $table->integer('km_troca');
            $table->integer('km_prox_troca');
            $table->unsignedBigInteger('fk_oficina');
            $table->unsignedBigInteger('fk_veiculo');            

            $table->foreign('fk_oficina')->references('id')->on('oficinas');
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
        Schema::dropIfExists('trocas__oleos');
    }
}
