<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriosAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios__abastecimentos', function (Blueprint $table) {
            $table->id('id_rel_abast');
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
        Schema::dropIfExists('relatorios__abastecimentos');
    }
}
