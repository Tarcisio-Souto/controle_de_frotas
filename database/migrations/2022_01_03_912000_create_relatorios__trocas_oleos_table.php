<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosTrocasOleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios__trocas__oleos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('caminho_relatorio');
            $table->unsignedBigInteger('fk_usuario');

            $table->foreign('fk_usuario')->references('id_usuario')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatorios__trocas__oleos');
    }
}
